# WebAppToolkit - Biological-database

Repository Name: MyWebApp

## Description

This repository contains the source code and assets for MyWebApp, a simple web application. It includes various PHP files, CSS styles, image files, and text files used to build the application.

## Files

- `Add page - Screenshot.jpg`: Screenshot of the Add page.
- `Contact page - Screenshot.jpg`: Screenshot of the Contact page.
- `Home page - Screenshot.jpg`: Screenshot of the Home page.
- `Indexpage - Screenshot.jpg`: Screenshot of the Index page.
- `POST.txt`: Text file containing POST data.
- `add.php`: PHP file for adding data.
- `add_example.php`: Example PHP file for adding data.
- `bh.jpg`: Image file used in the application.
- `contact.php`: PHP file for the contact page.
- `db.opt`: Database options file.
- `edit.php`: PHP file for editing data.
- `edit_example.php`: Example PHP file for editing data.
- `gene_data.frm`: Database table structure file.
- `gene_data.ibd`: Database table data file.
- `genes.txt`: Text file containing gene data.
- `home.php`: PHP file for the home page.
- `index.php`: PHP file for the index page.
- `index_1.php`, `index_2.php`, `index_3.php`, `index_4.php`, `index_5.php`: Additional PHP files for the index page.
- `index_example.php`: Example PHP file for the index page.
- `menu.txt`: Text file containing menu data.
- `remove.php`: PHP file for removing data.
- `remove_example.php`: Example PHP file for removing data.
- `search form.txt`: Text file containing the search form markup.
- `search.jpg`: Image file used in the search functionality.
- `sequences.frm`: Database table structure file.
- `styles.css`: CSS file for styling the application.
- `transcripts.fasta`: Text file containing transcript data.
- `transcripts.php`: PHP file for displaying transcripts.
- `transcripts_example.php`: Example PHP file for displaying transcripts.

## Installation

To use this web application locally, follow these steps:

1. Clone the repository: `git clone https://github.com/sivkri/MyWebApp.git`
2. Place the cloned files in your web server's root directory.
3. Ensure your web server has PHP and MySQL installed.
4. Import the database structure by executing the SQL files: `gene_data.frm` and `sequences.frm`.
5. Modify the database connection settings in the PHP files (`add.php`, `edit.php`, `remove.php`, `transcripts.php`) to match your MySQL configuration.
6. Start your web server and access the application through the browser.

## Usage

The web application provides the following functionality:

- **Add**: Add data to the database using the `add.php` file.
- **Edit**: Edit existing data in the database using the `edit.php` file.
- **Remove**: Remove data from the database using the `remove.php` file.
- **Search**: Perform searches using the search form in `search form.txt` and display results in `transcripts.php`.

Feel free to explore the different pages (`index.php`, `home.php`, `contact.php`) and their respective functionalities.

## Contributing

Contributions to this repository are welcome. If you find any issues or have improvements to suggest, please submit a pull request.

## License

This repository is licensed under the MIT License. See the `LICENSE` file for more information.
