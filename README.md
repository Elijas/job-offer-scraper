# Objective

Write PHP scraper which parses iBus job offers [page](http://www.ibusmedia.com/career.htm).

- Store parsed data in JSON format, which must be valid with `schema.json`;
- Write API endpoint which would return scraped data;
- write CLI task which would validate json with `schema.json`;

## Bonus

- use TDD (phpunit or phpspec which you prefer more)
- use BDD (Behat)


# Solution

## Preparation

Install required packages:

`composer require justinrainbow/json-schema`

## Usage
| Runnable File | Description |
| --- | --- |
| `scripts/scrape.php` | Run scraper and save jobs data in JSON format
| `scripts/validate.php` | Validate jobs data JSON with schema
| `src/jobs-data.php` | API endpoint to return jobs data JSON
