function toggleInstructions() {
    const content = document.getElementById('instructions-content');
    const icon = document.getElementById('toggle-icon');
    const instructions = document.getElementById('instructions');

    if (content.classList.contains('collapsed')) {
        content.classList.remove('collapsed');
        icon.textContent = '−';
        instructions.classList.remove('collapsed');
    } else {
        content.classList.add('collapsed');
        icon.textContent = '+';
        instructions.classList.add('collapsed');
    }
}

function toggleOption(optionName) {
    const checkbox = document.getElementById(`enable-${optionName}`);
    const select = document.getElementById(optionName);
    const optionDiv = document.getElementById(`option-${optionName}`);

    if (checkbox.checked) {
        select.disabled = false;
        optionDiv.classList.add('active');
    } else {
        select.disabled = true;
        select.selectedIndex = 0;
        optionDiv.classList.remove('active');

        // Special handling for task - also disable and clear the detail input
        if (optionName === 'task') {
            const taskDetail = document.getElementById('task-detail');
            taskDetail.disabled = true;
            taskDetail.value = '';
        }

        // Clear custom input if it exists
        const customInput = document.getElementById(`${optionName}-custom`);
        if (customInput) {
            customInput.disabled = true;
            customInput.value = '';
        }
    }

    updatePrompt();
}

function handleSelectChange(optionName) {
    const select = document.getElementById(optionName);
    const customInput = document.getElementById(`${optionName}-custom`);

    if (select.value === '__other__') {
        customInput.disabled = false;
        customInput.focus();
    } else {
        customInput.disabled = true;
        customInput.value = '';
    }

    updatePrompt();
}

function handleTaskSelect() {
    const taskSelect = document.getElementById('task');
    const taskDetail = document.getElementById('task-detail');
    const selectedTask = taskSelect.value;

    if (selectedTask) {
        taskDetail.disabled = false;
        if (selectedTask === '__other__') {
            // For "Other...", enable input but don't pre-populate
            taskDetail.value = '';
        } else {
            taskDetail.value = selectedTask + ' ';
        }
        taskDetail.focus();
    } else {
        taskDetail.disabled = true;
        taskDetail.value = '';
    }

    updatePrompt();
}

function updatePrompt() {
    const parts = [];

    // Get all enabled options
    const task = getSelectedValue('task', 'enable-task');
    const persona = getSelectedValue('persona', 'enable-persona');
    const context = getSelectedValue('context', 'enable-context');
    const audience = getSelectedValue('audience', 'enable-audience');
    const format = getSelectedValue('format', 'enable-format');
    const tone = getSelectedValue('tone', 'enable-tone');
    const references = getSelectedValue('references', 'enable-references');
    const constraints = getSelectedValue('constraints', 'enable-constraints');
    const evaluate = getSelectedValue('evaluate', 'enable-evaluate');
    const iterate = getSelectedValue('iterate', 'enable-iterate');

    // Build the prompt - persona first as a standalone sentence
    if (persona) parts.push(persona);
    if (task) parts.push(task);
    if (context) parts.push(context);
    if (audience) parts.push(audience);
    if (format) parts.push(format);
    if (tone) parts.push(tone);
    if (references) parts.push(references);
    if (constraints) parts.push(constraints);
    if (evaluate) parts.push(evaluate);
    if (iterate) parts.push(iterate);

    const promptOutput = document.getElementById('prompt-output');

    if (parts.length > 0) {
        promptOutput.textContent = parts.join(' ') + '.';
        promptOutput.classList.remove('empty');
    } else {
        promptOutput.textContent = 'Your prompt will appear here as you make selections...';
        promptOutput.classList.add('empty');
    }
}

function getSelectedValue(selectId, checkboxId) {
    const checkbox = document.getElementById(checkboxId);
    const select = document.getElementById(selectId);

    if (checkbox.checked && select.value) {
        // Special handling for task - return the detail input value
        if (selectId === 'task') {
            const taskDetail = document.getElementById('task-detail');
            return taskDetail.value.trim() || null;
        }

        // If "Other..." is selected, return the custom input value
        if (select.value === '__other__') {
            const customInput = document.getElementById(`${selectId}-custom`);
            return customInput.value.trim() || null;
        }

        return select.value;
    }

    return null;
}

function copyToClipboard() {
    const promptOutput = document.getElementById('prompt-output');
    const copyButton = document.getElementById('copy-button');
    const text = promptOutput.textContent;

    if (text === 'Your prompt will appear here as you make selections...') {
        return;
    }

    navigator.clipboard.writeText(text).then(function() {
        copyButton.textContent = '✓ Copied!';
        copyButton.classList.add('copied');

        setTimeout(function() {
            copyButton.textContent = 'Copy to Clipboard';
            copyButton.classList.remove('copied');
        }, 2000);
    }).catch(function(err) {
        alert('Failed to copy to clipboard. Please try again.');
        console.error('Copy failed:', err);
    });
}

function resetAll() {
    const options = ['task', 'persona', 'context', 'audience', 'format', 'tone', 'references', 'constraints', 'evaluate', 'iterate'];

    options.forEach(function(optionName) {
        const checkbox = document.getElementById(`enable-${optionName}`);
        const select = document.getElementById(optionName);
        const optionDiv = document.getElementById(`option-${optionName}`);
        const customInput = document.getElementById(`${optionName}-custom`);

        // Uncheck and disable
        checkbox.checked = false;
        select.disabled = true;
        select.selectedIndex = 0;
        optionDiv.classList.remove('active');

        // Clear custom inputs
        if (customInput) {
            customInput.disabled = true;
            customInput.value = '';
        }
    });

    // Special handling for task detail
    const taskDetail = document.getElementById('task-detail');
    taskDetail.disabled = true;
    taskDetail.value = '';

    updatePrompt();
}
