# Export Admin Tables Plugin Documentation

## Overview

The **Export Admin Tables** plugin for WordPress provides the ability to export table data from the WordPress admin panel into CSV format. This feature is especially useful when working with large amounts of data in tables such as **Posts**, **Pages**, or **Users**.

### Key Features

- **CSV Export**: Export WordPress admin tables as CSV files.
- **Column Selection**: Choose which columns to include in the exported CSV.
- **Automatic Formatting**: Automatically removes sorting text and formats data for easier use.
  
## Installation Guide

### Requirements

- WordPress 4.0 or higher.
- PHP 5.6 or higher.

### Installation Steps

1. **Download the Plugin**:
   Download the plugin zip file from the [GitHub Repository](https://github.com/your-github-link).

2. **Upload the Plugin**:
   - Navigate to the **Plugins > Add New** section in your WordPress dashboard.
   - Click the **Upload Plugin** button.
   - Choose the zip file you downloaded and click **Install Now**.
   - Once installed, click **Activate Plugin** to activate the plugin.

3. **Verify Plugin Activation**:
   After activation, the plugin will be active and the export button will appear in your admin tables.

## Usage Instructions

### Step-by-Step Process

1. **Go to an Admin Table**: Navigate to any table in the WordPress admin area (e.g., **Posts**, **Users**).
2. **Column Selection**: You will see checkboxes for each column in the table's header. Select the columns you want to include in the export.
3. **Export to CSV**: After selecting the desired columns, click the **Export to CSV** button. The data will be exported in CSV format and automatically downloaded.

## Customization

The plugin can be extended by modifying the JavaScript function `eat_add_export_button_and_checkboxes`. For developers, the function can be modified to support more complex tables or integrate additional export features.

### Modifying the Export Functionality

To customize the export process, developers can adjust the JavaScript code inside the plugin’s main file. For example:

- Add custom filters to include or exclude specific rows.
- Modify the CSV generation logic to add extra formatting or support additional export formats (e.g., JSON or Excel).

## Troubleshooting

### Common Issues

1. **Button not showing on tables**: 
   - Ensure the plugin is activated and that you are viewing a table that supports this feature.
   - Clear browser cache or check the browser's developer console for any JavaScript errors.

2. **Empty CSV files**: 
   - Ensure the table has data and that you've selected the appropriate columns to export.

## Developer Notes

- The plugin hooks into the WordPress admin footer to inject JavaScript into the page.
- It targets tables with the class `.wp-list-table` which is common to all default admin tables in WordPress.
- The export functionality uses Blob to generate and download the CSV file.

## License

The Export Admin Tables Plugin is released under the MIT License. See [LICENSE](../LICENSE) for more information.

## Contact

For support or contributions, please open an issue on the [GitHub Repository](https://github.com/your-github-link).
