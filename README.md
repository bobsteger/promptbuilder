# AI Prompt Builder

A web-based tool that helps users construct effective prompts for AI engines through an intuitive, guided interface.

## Features

- **10 Prompt Categories**: Task, Persona, Context, Audience, Format, Tone, References, Constraints, Evaluate, and Iterate
- **Dynamic Prompt Generation**: Watch your prompt build in real-time as you make selections
- **Custom Options**: Each category includes an "Other..." option for custom values
- **Copy to Clipboard**: One-click copying of your generated prompt
- **Reset Functionality**: Clear all selections and start fresh
- **Responsive Design**: Works on desktop and mobile devices

## Requirements

- PHP 7.0 or higher
- Web server (Apache, Nginx, or PHP's built-in server)

## Installation

1. Clone or download the files to your web server directory
2. Ensure `index.php` and `styles.css` are in the same folder
3. Access via your web browser

### Using PHP's Built-in Server

```bash
cd /path/to/promptbuilder
php -S localhost:8000
```

Then open `http://localhost:8000` in your browser.

## Usage

1. Check the box next to each prompt element you want to include
2. Select an option from the dropdown, or choose "Other..." to enter a custom value
3. For Task, select an action verb and then describe what you want the AI to do
4. Your prompt builds dynamically at the bottom of the page
5. Click "Copy to Clipboard" to use your prompt with any AI engine

## File Structure

```
promptbuilder/
├── index.php    # Main application file
├── styles.css   # Stylesheet
└── README.md    # This file
```

## Categories Explained

| Category | Purpose |
|----------|---------|
| Task | The action you want the AI to perform (Write, Analyze, etc.) |
| Persona | The role the AI should assume (Expert, Teacher, etc.) |
| Context | The setting or background for the task |
| Audience | Who will read the AI's output |
| Format | How the output should be structured |
| Tone | The style of communication |
| References | Examples or sources to include |
| Constraints | Limitations or requirements |
| Evaluate | Quality checks to apply |
| Iterate | How to refine or expand the output |

## License

MIT License
