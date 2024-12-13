<?php
/*
Plugin Name: Export Admin Tables
Plugin URI: https://www.linkedin.com/in/kingsley-james-hart-93679b184/?originalSubdomain=ng
Description: Adds the ability to export admin tables as CSV files.
Version: 1.4
Author: James-Hart Kingsley
Author URI: https://www.linkedin.com/in/kingsley-james-hart-93679b184/?originalSubdomain=ng
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Add the export button and column selection checkboxes to admin tables
function eat_add_export_button_and_checkboxes() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('table.wp-list-table').each(function() {
                var table = $(this);
                var thead = table.find('thead tr');
                var checkboxes = '<div id="column-selection">';
                thead.find('th').each(function(index) {
                    var column = $(this).text().trim().replace('Sort ascending', '').replace('Sort descending', '').trim(); // Remove sorting text
                    checkboxes += '<label><input type="checkbox" class="column-checkbox" data-index="' + index + '" checked> ' + column + '</label><br>';
                });
                checkboxes += '</div>';
                table.before('<button id="export-to-csv" class="button action">Export to CSV</button>' + checkboxes);
            });

            // On button click, export table data
            $('#export-to-csv').on('click', function() {
                var table = $(this).next('div#column-selection').next('table');
                var selected_columns = [];
                $(this).next('div#column-selection').find('.column-checkbox:checked').each(function() {
                    selected_columns.push($(this).data('index'));
                });

                // Gather only the data of selected columns
                var table_data = [];
                table.find('tr').each(function() {
                    var row_data = [];
                    $(this).find('th, td').each(function(index) {
                        if (selected_columns.includes(index)) {
                            var cellText = $(this).text().trim().replace('Sort ascending', '').replace('Sort descending', '').trim(); // Remove sorting text
                            row_data.push('"' + cellText.replace(/"/g, '""') + '"'); // Escape double quotes
                        }
                    });
                    // Filter out rows that are completely empty or contain unwanted text
                    if (row_data.filter(function(cell) { return cell !== '""'; }).length > 0 && !/^(Select Item|Edit \| Delete PermanentlyShow more details)/.test(row_data.join(','))) {
                        table_data.push(row_data);
                    }
                });

                // Convert table data to CSV format
                var csv_content = '';
                table_data.forEach(function(row) {
                    csv_content += row.join(',') + "\n";
                });

                // Download the CSV file
                var blob = new Blob([csv_content], { type: 'text/csv;charset=utf-8;' });
                var url = URL.createObjectURL(blob);
                var link = document.createElement('a');
                link.setAttribute('href', url);
                link.setAttribute('download', 'table-export.csv');
                link.style.visibility = 'hidden';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'eat_add_export_button_and_checkboxes');
