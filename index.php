<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Prompt Builder</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>AI Prompt Builder</h1>
            <p>Craft powerful prompts for AI engines with ease</p>
        </div>

        <div class="instructions" id="instructions">
            <div class="instructions-header" onclick="toggleInstructions()">
                <h2>How to Use</h2>
                <span class="toggle-icon" id="toggle-icon">−</span>
            </div>
            <ul class="instructions-content" id="instructions-content">
                <li>Check the boxes next to the elements you want to include in your prompt</li>
                <li>Select the appropriate option from each enabled dropdown</li>
                <li>Watch your prompt build dynamically at the bottom of the page</li>
                <li>Click "Copy to Clipboard" to use your prompt with any AI engine</li>
            </ul>
        </div>

        <div class="builder-section">
            <!-- Task -->
            <div class="prompt-option" id="option-task">
                <div class="option-header">
                    <input type="checkbox" id="enable-task" onchange="toggleOption('task')">
                    <label for="enable-task">Task</label>
                    <span class="help-text">What action should the AI perform?</span>
                </div>
                <div class="option-content">
                    <select id="task" disabled onchange="handleTaskSelect()">
                        <option value="">Select a task...</option>
                        <option value="Write">Write</option>
                        <option value="Analyze">Analyze</option>
                        <option value="Summarize">Summarize</option>
                        <option value="Explain">Explain</option>
                        <option value="Create">Create</option>
                        <option value="Design">Design</option>
                        <option value="Review">Review</option>
                        <option value="Compare">Compare</option>
                        <option value="Debug">Debug</option>
                        <option value="Optimize">Optimize</option>
                        <option value="Translate">Translate</option>
                        <option value="Generate">Generate</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="task-detail" class="task-detail-input" disabled placeholder="Describe what you want the AI to do..." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Persona -->
            <div class="prompt-option" id="option-persona">
                <div class="option-header">
                    <input type="checkbox" id="enable-persona" onchange="toggleOption('persona')">
                    <label for="enable-persona">Persona</label>
                    <span class="help-text">What role should the AI assume?</span>
                </div>
                <div class="option-content">
                    <select id="persona" disabled onchange="handleSelectChange('persona')">
                        <option value="">Select a persona...</option>
                        <option value="You are an expert software engineer.">Expert Software Engineer</option>
                        <option value="You are a technical writer.">Technical Writer</option>
                        <option value="You are a data scientist.">Data Scientist</option>
                        <option value="You are a creative copywriter.">Creative Copywriter</option>
                        <option value="You are a business consultant.">Business Consultant</option>
                        <option value="You are a teacher.">Teacher</option>
                        <option value="You are a journalist.">Journalist</option>
                        <option value="You are a marketing expert.">Marketing Expert</option>
                        <option value="You are a UX designer.">UX Designer</option>
                        <option value="You are a legal advisor.">Legal Advisor</option>
                        <option value="You are a financial analyst.">Financial Analyst</option>
                        <option value="You are a medical professional.">Medical Professional</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="persona-custom" class="custom-input" disabled placeholder="e.g., You are a creative director." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Context -->
            <div class="prompt-option" id="option-context">
                <div class="option-header">
                    <input type="checkbox" id="enable-context" onchange="toggleOption('context')">
                    <label for="enable-context">Context</label>
                    <span class="help-text">What is the setting or background?</span>
                </div>
                <div class="option-content">
                    <select id="context" disabled onchange="handleSelectChange('context')">
                        <option value="">Select context...</option>
                        <option value="for a beginner audience">For beginners</option>
                        <option value="for an advanced audience">For advanced users</option>
                        <option value="for a technical audience">For technical audience</option>
                        <option value="for a non-technical audience">For non-technical audience</option>
                        <option value="for a business context">For business context</option>
                        <option value="for an academic setting">For academic setting</option>
                        <option value="for a startup environment">For startup environment</option>
                        <option value="for enterprise use">For enterprise use</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="context-custom" class="custom-input" disabled placeholder="Enter custom context..." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Audience -->
            <div class="prompt-option" id="option-audience">
                <div class="option-header">
                    <input type="checkbox" id="enable-audience" onchange="toggleOption('audience')">
                    <label for="enable-audience">Audience</label>
                    <span class="help-text">Who will read this content?</span>
                </div>
                <div class="option-content">
                    <select id="audience" disabled onchange="handleSelectChange('audience')">
                        <option value="">Select target audience...</option>
                        <option value="targeted at developers">Developers</option>
                        <option value="targeted at business executives">Business Executives</option>
                        <option value="targeted at students">Students</option>
                        <option value="targeted at general public">General Public</option>
                        <option value="targeted at researchers">Researchers</option>
                        <option value="targeted at marketers">Marketers</option>
                        <option value="targeted at designers">Designers</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="audience-custom" class="custom-input" disabled placeholder="Enter custom audience..." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Format -->
            <div class="prompt-option" id="option-format">
                <div class="option-header">
                    <input type="checkbox" id="enable-format" onchange="toggleOption('format')">
                    <label for="enable-format">Format</label>
                    <span class="help-text">How should the output be structured?</span>
                </div>
                <div class="option-content">
                    <select id="format" disabled onchange="handleSelectChange('format')">
                        <option value="">Select output format...</option>
                        <option value="in a structured outline format">Structured Outline</option>
                        <option value="in bullet points">Bullet Points</option>
                        <option value="as a numbered list">Numbered List</option>
                        <option value="in paragraph form">Paragraph Form</option>
                        <option value="as a step-by-step guide">Step-by-Step Guide</option>
                        <option value="in markdown format">Markdown Format</option>
                        <option value="as JSON">JSON Format</option>
                        <option value="as a table">Table Format</option>
                        <option value="as code">Code Format</option>
                        <option value="as a report">Report Format</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="format-custom" class="custom-input" disabled placeholder="Enter custom format..." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Tone -->
            <div class="prompt-option" id="option-tone">
                <div class="option-header">
                    <input type="checkbox" id="enable-tone" onchange="toggleOption('tone')">
                    <label for="enable-tone">Tone</label>
                    <span class="help-text">What style of communication?</span>
                </div>
                <div class="option-content">
                    <select id="tone" disabled onchange="handleSelectChange('tone')">
                        <option value="">Select tone...</option>
                        <option value="in a professional tone">Professional</option>
                        <option value="in a casual and friendly tone">Casual & Friendly</option>
                        <option value="in a formal tone">Formal</option>
                        <option value="in an enthusiastic tone">Enthusiastic</option>
                        <option value="in a concise and direct tone">Concise & Direct</option>
                        <option value="in an empathetic tone">Empathetic</option>
                        <option value="in a humorous tone">Humorous</option>
                        <option value="in an authoritative tone">Authoritative</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="tone-custom" class="custom-input" disabled placeholder="Enter custom tone..." oninput="updatePrompt()">
                </div>
            </div>

            <!-- References -->
            <div class="prompt-option" id="option-references">
                <div class="option-header">
                    <input type="checkbox" id="enable-references" onchange="toggleOption('references')">
                    <label for="enable-references">References</label>
                    <span class="help-text">What examples or sources to include?</span>
                </div>
                <div class="option-content">
                    <select id="references" disabled onchange="handleSelectChange('references')">
                        <option value="">Select reference requirement...</option>
                        <option value="Include citations and sources">With citations and sources</option>
                        <option value="Include real-world examples">With real-world examples</option>
                        <option value="Include code examples">With code examples</option>
                        <option value="Include case studies">With case studies</option>
                        <option value="Reference industry best practices">With best practices</option>
                        <option value="Include statistical data">With statistical data</option>
                        <option value="Reference academic research">With academic research</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="references-custom" class="custom-input" disabled placeholder="Enter custom reference..." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Constraints -->
            <div class="prompt-option" id="option-constraints">
                <div class="option-header">
                    <input type="checkbox" id="enable-constraints" onchange="toggleOption('constraints')">
                    <label for="enable-constraints">Constraints</label>
                    <span class="help-text">What limitations or requirements?</span>
                </div>
                <div class="option-content">
                    <select id="constraints" disabled onchange="handleSelectChange('constraints')">
                        <option value="">Select constraints...</option>
                        <option value="Keep it under 500 words">Under 500 words</option>
                        <option value="Keep it under 1000 words">Under 1000 words</option>
                        <option value="Make it brief and concise">Brief and concise</option>
                        <option value="Provide comprehensive details">Comprehensive and detailed</option>
                        <option value="Focus on actionable insights">Actionable insights only</option>
                        <option value="Avoid technical jargon">Avoid technical jargon</option>
                        <option value="Use simple language">Use simple language</option>
                        <option value="Must be beginner-friendly">Beginner-friendly</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="constraints-custom" class="custom-input" disabled placeholder="Enter custom constraints..." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Evaluate -->
            <div class="prompt-option" id="option-evaluate">
                <div class="option-header">
                    <input type="checkbox" id="enable-evaluate" onchange="toggleOption('evaluate')">
                    <label for="enable-evaluate">Evaluate</label>
                    <span class="help-text">What quality checks to apply?</span>
                </div>
                <div class="option-content">
                    <select id="evaluate" disabled onchange="handleSelectChange('evaluate')">
                        <option value="">Select evaluation criteria...</option>
                        <option value="Ensure accuracy and factual correctness">Accuracy and factual correctness</option>
                        <option value="Ensure clarity and readability">Clarity and readability</option>
                        <option value="Ensure completeness of information">Completeness of information</option>
                        <option value="Ensure logical flow and structure">Logical flow and structure</option>
                        <option value="Verify against best practices">Against best practices</option>
                        <option value="Check for potential issues or errors">For potential issues</option>
                        <option value="Assess practical applicability">Practical applicability</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="evaluate-custom" class="custom-input" disabled placeholder="Enter custom evaluation..." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Iterate -->
            <div class="prompt-option" id="option-iterate">
                <div class="option-header">
                    <input type="checkbox" id="enable-iterate" onchange="toggleOption('iterate')">
                    <label for="enable-iterate">Iterate</label>
                    <span class="help-text">How to refine or expand the output?</span>
                </div>
                <div class="option-content">
                    <select id="iterate" disabled onchange="handleSelectChange('iterate')">
                        <option value="">Select iteration approach...</option>
                        <option value="Provide multiple alternative approaches">Multiple alternatives</option>
                        <option value="Show progressive refinements">Progressive refinements</option>
                        <option value="Include variations for different scenarios">Variations for scenarios</option>
                        <option value="Offer improvements and optimizations">Improvements and optimizations</option>
                        <option value="Present pros and cons of each option">Pros and cons</option>
                        <option value="Suggest next steps for refinement">Next steps for refinement</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="iterate-custom" class="custom-input" disabled placeholder="Enter custom iteration..." oninput="updatePrompt()">
                </div>
            </div>
        </div>

        <div class="output-section" id="output-section">
            <h2>Generated Prompt</h2>
            <div id="prompt-output" class="prompt-output empty">Your prompt will appear here as you make selections...</div>
            <div class="button-group">
                <button class="copy-button" id="copy-button" onclick="copyToClipboard()">Copy to Clipboard</button>
                <button class="reset-button" id="reset-button" onclick="resetAll()">Reset All</button>
            </div>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>
