# Export Admin Tables Plugin

## Description

The **Export Admin Tables** plugin for WordPress adds the functionality to export data from admin tables (such as post or user tables) to CSV files. It includes the ability to select columns to export and removes unnecessary sorting text from the output.

## Features

- Add a button to export admin tables as CSV.
- Allows selection of columns to include in the exported CSV.
- Removes unwanted sorting text from table data.
- Easy to install and use.

## Installation

1. **Download the plugin**:
   Download the plugin from [GitHub](https://github.com/kcblak/export-admin-tables) or directly upload the `.zip` file to your WordPress site.

2. **Install the plugin**:
   - Go to your WordPress dashboard.
   - Navigate to **Plugins > Add New**.
   - Click **Upload Plugin** and select the downloaded `.zip` file.
   - Install and activate the plugin.

## Usage

Once activated, the plugin will automatically add an **Export to CSV** button to all admin tables. It will also display checkboxes above each column, allowing you to select which columns you want to export.

1. Navigate to any admin table (such as **Posts**, **Pages**, **Users**, etc.).
2. You will see an **Export to CSV** button at the top of the table.
3. Use the checkboxes to select the columns you want to export.
4. Click the **Export to CSV** button to download the data in CSV format.

## How It Works

- The plugin hooks into the WordPress admin footer to add a button and column selection options.
- Upon clicking the export button, the plugin gathers only the selected columns' data from the table.
- It then compiles the data into CSV format, escaping any special characters like double quotes.
- A CSV file is created and downloaded automatically.

## Developer Documentation

### Functions

- `eat_add_export_button_and_checkboxes()`: This function adds the export button and column selection checkboxes to admin tables. It also handles the JavaScript functionality to export the data.

### JavaScript Code
The JavaScript within the plugin:

1. Finds all the admin tables (`table.wp-list-table`).
2. Adds checkboxes for each column in the table's header to allow the user to select which columns to include in the export.
3. Adds the **Export to CSV** button above the table.
4. Handles the CSV export when the button is clicked by:
   - Collecting data from the selected columns.
   - Cleaning up any unwanted text (such as "Sort ascending" or "Sort descending").
   - Creating and triggering the download of a CSV file.

## Contributing

1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Make your changes.
4. Submit a pull request with a description of your changes.

## License

This plugin is licensed under the [MIT License](LICENSE).
