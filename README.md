# Wholegrain Digital Backend Test

We would like you to show your understanding of PHP & WordPress by building a
plugin that registers a post type and taxonomy, and then imports content into
the newly created post type and taxonomy.

We have included the boilerplate for the plugin.

## Requirements
* Register a post type called "wgd-locations". Ensure it has
  * Gutenberg enabled
  * an archive page at the url /locations
*  Register a taxonomy called "wgd-category". Ensure it
   * does not generate public urls,
   * can be administered in WordPress
* Write a function that imports locations from a CSV from a URL to the "wgd-locations" post type
    * For the sake of the test, you can simply use a $_GET query var to test whether or not to perform an import, but in a final version, the import would occur on a scheduled interval.

### Field Mapping
| CSV | WordPress | Description |
|--|--|--|
| id | Custom field | a unique identifier for the post |
| customer | Post title | the customer name |
| category | wgd-category | the type of location it is |
| description | Post content | the content that should be displayed with the location |
| address | Custom field | a textual representation of the address |

### CSV
The CSV will be hosted as part of the repository and should be downloaded as part of the code, assume that the import will be run on a scheduled interval and the CSV will be updated regularly.
The CSV url is https://gitlab.com/wholegrain/webdeveloper-test/-/raw/master/backend-test/locations.csv
