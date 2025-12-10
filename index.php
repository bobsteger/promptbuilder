<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Prompt Builder</title>
    <link rel="stylesheet" href="styles-neon.css">
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
                        <option value="an expert software engineer">Expert Software Engineer</option>
                        <option value="a technical writer">Technical Writer</option>
                        <option value="a data scientist">Data Scientist</option>
                        <option value="a creative copywriter">Creative Copywriter</option>
                        <option value="a business consultant">Business Consultant</option>
                        <option value="a teacher">Teacher</option>
                        <option value="a journalist">Journalist</option>
                        <option value="a marketing expert">Marketing Expert</option>
                        <option value="a UX designer">UX Designer</option>
                        <option value="a legal advisor">Legal Advisor</option>
                        <option value="a financial analyst">Financial Analyst</option>
                        <option value="a medical professional">Medical Professional</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="persona-custom" class="custom-input" disabled placeholder="e.g., a creative director." oninput="updatePrompt()">
                </div>
            </div>

            <!-- Context -->
            <div class="prompt-option" id="option-context">
                <div class="option-header">
                    <input type="checkbox" id="enable-context" onchange="toggleOption('context')">
                    <label for="enable-context">Context</label>
                    <span class="help-text">What is the setting or background? Who or what is this for?</span>
                </div>
                <div class="option-content">
                    <select id="context" disabled onchange="handleSelectChange('context')">
                        <option value="">Select context...</option>
                        <option value="a beginner audience">For beginners</option>
                        <option value="an advanced audience">For advanced users</option>
                        <option value="a technical audience">For technical audience</option>
                        <option value="a non-technical audience">For non-technical audience</option>
                        <option value="a business context">For business context</option>
                        <option value="an academic setting">For academic setting</option>
                        <option value="a startup environment">For startup environment</option>
                        <option value="enterprise use">For enterprise use</option>
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
                        <option value="developers">Developers</option>
                        <option value="business executives">Business Executives</option>
                        <option value="students">Students</option>
                        <option value="general public">General Public</option>
                        <option value="researchers">Researchers</option>
                        <option value="marketers">Marketers</option>
                        <option value="designers">Designers</option>
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

            <!-- Avoid -->
            <div class="prompt-option" id="option-avoid">
                <div class="option-header">
                    <input type="checkbox" id="enable-avoid" onchange="toggleOption('avoid')">
                    <label for="enable-avoid">Avoid</label>
                    <span class="help-text">What should the AI not include?</span>
                </div>
                <div class="option-content">
                    <select id="avoid" disabled onchange="handleSelectChange('avoid')">
                        <option value="">Select what to avoid...</option>
                        <option value="technical jargon and complex terminology">Technical jargon</option>
                        <option value="lengthy explanations and unnecessary details">Long explanations</option>
                        <option value="code examples or snippets">Code examples</option>
                        <option value="personal opinions or subjective statements">Personal opinions</option>
                        <option value="speculation, assumptions, or guessing">Speculation or guessing</option>
                        <option value="marketing language and promotional content">Marketing speak</option>
                        <option value="complex vocabulary and difficult words">Complex vocabulary</option>
                        <option value="humor, jokes, or casual language">Humor or jokes</option>
                        <option value="emojis, special characters, or formatting">Emojis and special characters</option>
                        <option value="repetition and redundant information">Repetition</option>
                        <option value="filler words and unnecessary phrases">Filler words</option>
                        <option value="controversial or sensitive topics">Controversial topics</option>
                        <option value="__other__">Other...</option>
                    </select>
                    <input type="text" id="avoid-custom" class="custom-input" disabled placeholder="Enter what to avoid..." oninput="updatePrompt()">
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

    <script src="script.js"></script>
</body>
</html>
