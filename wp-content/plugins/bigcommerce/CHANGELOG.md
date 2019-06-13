# Changelog

## [3.1.0]

### Added
- Added a button to reset channel listing overrides, enabling editors to
  reconnect a product to the base product for future updates.
- Added a button to immediately re-sync a product. Editors can import the
  latest changes from the BigCommerce API for that product without running
  a full import on the entire catalog.
- Added a missing entry to the 3.0.0 changelog regarding fixing the uninstaller.
- Added a method to fetch customer group info. `$customer->get_group()->get_info()`
- Created an option to toggle synchronization of analytics settings.
- Added a customizer option to disable Quick View on product cards. When disabled,
  product card images are wrapped in a link to the product single.
- Added a template for the sku component of a product, `components/products/product-sku.php`.
- Added a new shortcode/block that allows selection of distinct product
  components. Example usage: `[bc-component type="description" id="117"]`.
  Valid types are: sku, description, image, title.
- Added an option to disable sync of analytics IDs.

### Fixed
- Fixed missing markup for AMP templates. Some valid tags had been
  erroneously stripped out.

### Changed
- Added a new parameter to the product title template (`components/products/product-title.php`)
  to set the header level. It should set the header appropriately
  for the context in which the component is loaded (h1 for the product
  single, h2 for the shortcode/block single, and h3 for the product card).
- Moved the Quick View markup from `components/products/product-card.php` to
  a new template, `components/products/quick-view-image.php`.
- Removed the wrapper div from the template `components/products/product-quick-view.php`.
  The wrapper will be added by the template controller.
- Changed the `assign_terms` capability for categories and brands to `do_not_allow`.
  Assignments would be overwritten by the next import. This keeps it from
  happening in the first place to avoid confusion.
- Turned off the `autocomplete` attribute on API fields in the settings 
  page. This will help to avoid an issue where autocomplete causes a change to
  user credentials and causes the store to disconnect when settings are saved.
- Updated the product quick view template, `components/products/product-quick-view.php`,
  uses the new product sku component.
- Updated the product shortcode single template, `components/products/product-shortcode-single.php`,
  uses the new product sku component.
- Updated the product single template, `components/products/product-single.php`,
  uses the new product sku component.
- Updated the onboarding flow to indicate where the user is in the setup process. Additionally,
  some styles were updated on the content areas, buttons, and start-over feature.
- Optimized the import process to avoid fetching data for products not listed
  in any active channels.

### Deprecated
- Deprecated the `$quickview` and `$attributes` variables in the template
  `components/products/product-card.php`. The variables are now empty, and
  will be removed in a future version.

## [3.0.2]

### Fixed
- Updated API client library to 1.12.1 to fix error in class definition
  for PriceRecord.

## [3.0.1]

### Fixed
- Fixed duplicate posts created in WordPress when importing products
  in draft or pending status. 

## [3.0.0]

### Added
- Added support for connecting to multiple BigCommerce channels. Since the
  plugin can't know the particular use case a store has for using multiple
  channels, we provide the base framework for site developers to extend
  in a way that makes sense for their business. Multi-channel support
  requires opt-in using a filter:
  ```
  add_filter( 'bigcommerce/channels/enable-multi-channel', '__return_true' );
  ```
  This will enable an admin to connect to multiple channels on the settings
  screen. The primary channel will still be used for all front-end requests
  unless filtered to use a different channel. Example:
  ```
  add_filter( 'bigcommerce/channel/current', function( $channel ) {
    // do some logic here to determine what channel to use
    return get_term( 697, \BigCommerce\Taxonomies\Channel\Channel::NAME );
  });
  ```
- Created a taxonomy for storing channels. Most stores will only have one,
  but a store with multi-channel enabled may have many. The taxonomy's UI
  is hidden, and it is only exposed during onboarding (when selecting the
  initial channel) and in the Channel Settings section when multi-channel
  is enabled. All products are associated with a channel term on import.

### Changed
- Updated the position and design of the start-over button and confirmation
  message for the on-boarding process.
- Fixed display of tax and total price in order history when an order was
  paid for entirely with store credit. It should no longer show a negative
  subtotal, and the grand total should properly display as $0.00 (formatted
  appropriately for the local currency).
- Currency can now be filtered at any point in the request. Previously,
  the currency would be locked in place when creating the formatter
  in the Currency service provider. The service provider will now use
  a factory method to return a formatter based on the current, possibly
  filtered, value of the `\BigCommerce\Settings\Sections\Currency::CURRENCY_CODE`
  option. Use the `pre_option_bigcommerce_currency_code` filter to adjust
  the currency in use at any given point in the request.
- The import process has changed to more efficiently support imports when
  connected to multiple channels. After fetching listings for each channel,
  products will be fetched from the Catalog API _once_. When fetching products
  in bulk, we now also fetch options and modifiers, taking advantage of
  new capabilities of the API. This limits the bulk import to 10 products
  per request, but saves two additional queries per product later in the import.
  The tasks to fetch listings and initialize channels now have a suffix
  of the channel ID on the string used to trigger the task status.
- The import queue is now stored as hidden posts in the `wp_posts` table,
  using the post type `bigcommerce_task`.
- Method signature for the `\BigCommerce\Import\Importers\Products\Product_Builder`
  constructor has changed. It now expects a \WP_Term representing the channel
  the product belongs to.
- Method signature for the `\BigCommerce\Import\Importers\Products\Product_Importer`
  constructor has changed. It now expects a \WP_Term representing the channel
  the product belongs to instead of a channel ID and an instance of the Channels API.
- Method signature for the `\BigCommerce\Import\Importers\Products\Product_Saver`
  constructor has changed. It now expects a \WP_Term representing the channel
  the product belongs to.
- The order of operations in `\BigCommerce\Import\Importers\Products\Product_Saver`
  has changed to assign terms to a product before setting its post data
  or post meta. This is to support multiple products with the same slug
  but in different channels.
- Method signature for the `\BigCommerce\Import\Importers\Products\Product_Strategy_Factory`
  constructor has changed. It now expects a \WP_Term representing the channel
  the product belongs to.
- Product price ranges are now calculated on import and stored in post meta
  rather than relying on values from the bc_variants table on render.
- Moved `\BigCommerce\Import\Review_Builder` to
  `\BigCommerce\Import\Importers\Reviews\Review_Builder`.
- Moved `\BigCommerce\Import\Review_Fetcher` to
  `\BigCommerce\Import\Importers\Reviews\Review_Fetcher`.
- Method signature for the `\BigCommerce\Import\Processors\Channel_Initializer`
  constructor has changed. It now expects a \WP_Term representing the channel
  to initialize.
- Renamed `\BigCommerce\Import\Processors\Listing_ID_Fetcher` to
  `\BigCommerce\Import\Processors\Listing_Fetcher` and changed its constructor
  signature to require a \WP_Term representing the channel for the listings.
- Renamed `\BigCommerce\Import\Processors\Product_ID_Fetcher` to
  `\BigCommerce\Import\Processors\Product_Data_Fetcher`.
- Changed the method signature for the `\BigCommerce\Import\Processors\Queue_Runner`
  constructor. It no longer requires an instance of the Channels API.
- Moved `\BigCommerce\Merchant\Routes` to `\BigCommerce\Taxonomies\Channels\Routes`

### Fixed
- Updated registration of block editor plugins to work with recent
  versions of Gutenberg.
- Fixed fatal error in the uninstaller from an undefined class constant.
  
### Removed
- Removed the `bc_products` table. All queries that used this table have been
  updated to use post meta.
- Removed the `bc_variants` table. All queries that used this table have been
  updated to use post meta.
- Removed the `bc_import_queue` table. All import tasks have been moved to
  the `wp_posts` table.
- Removed the `bigcommerce/pricing/channel_id` filter. The pricing API request
  will now derive the value from the current channel.
- Removed the `bigcommerce/pricing/currency_code` filter. The pricing API
  request will now derive the value from the `bigcommerce_currency_code` option.

### Deprecated
- The `post_id` field in the `bc_reviews` table is no longer used and
  will be removed in a future release.

## [2.2.1]

### Changed
- Updated the way cached pricing works while requesting new data from the
  Pricing API. We're now displaying the cached pricing first. We've also
  removed the spinner while loading pricing data and replaced with a simple
  fade in/out of prices.

## [2.2.0]

### Added
- Added a redirect to the Welcome/Settings screen on plugin activation

### Changed
- Updated the BigCommerce Checkout SDK to version 1.18.10

### Fixed
- Fixed a layout issue on the WP Admin BigCommerce Resources page where 
  resource cards were misaligned.
- Fixed AMP validation errors from improperly included scripts. Thanks, @westonruter!


## [2.1.0]

### Added
- Uses the new BigCommerce pricing API to retrieve more accurate pricing
  data based on selected product variants, options, and customer groups.
  The original price display feature still exists and is now the fallback
  if unable to fetch live pricing.
- Added a setting to determine whether prices should display with tax
  included or excluded. This duplicates a setting from the BigCommerce
  admin that is not available via the Store API.
- Added the `customer_group_id` property to the customer profile object
  retrieved from the Customer API.
- Added a routine to make BigCommerce nav menu meta boxes visible to users
  by default.
- Added webhooks to listen for product inventory updates. A received webhook
  will schedule an immediate cron job to pull updated product data from
  the Catalog API. 

### Changed
- Upgraded Checkout SDK to version 1.18.5
- Reduced the prominence of the checkout requirements notification when on
  admin pages unrelated to the BigCommerce plugin.
- Updated the template `components/products/product-price.php` with markup
  to support Pricing API ajax requests.

## [2.0.1]

### Fixed
- Handled the new firing order of block-editor related hooks in transitioning
  from the Gutenberg plugin to WordPress 5.0+. This fixes a PHP warning
  and some odd behavior from other plugins that register meta areas
  for the block editor.


## [2.0.0]

### Added
- Added new links and buttons to the Products custom post type edit screen 
  and the BigCommerce Settings page for managing your products on BigCommerce 
  and logging in to your account
- Added a Resources page to the BigCommerce admin section. The Resources page
  contains tab separated content that provides users with a repository of
  themes, plugins, apps, and support links to enhance or extend their
  BigCommerce for WordPress installation.
- Added an option to create a new menu in addition to selecting a preexisting
  menu on the Menu Select screen during on-boarding.
- Added an option to configure channel settings for new products during
  on-boarding. The channel selection screen is always shown now, even
  for new accounts that don't yet have a channel.
- Added an option to the on-boarding process to choose between a
  full-featured store and one directed more towards bloggers. This
  sets default settings depending on your choice.
- Added a filter for customer profile fields fetched from the API: 
  `bigcommerce/customer/empty_profile`
- Added a filter to wrap the output of a template. Can be used to prepend
  or append content to the template:
  `bigcommerce/template={$template}/output`
- Added a template for the checkout button on the cart

### Changed
- Updated the error handling and response messages related to the product 
  sync feature. We now provide more information to the user based on the
  type of error that has occurred.
- Added the product SKU to post meta, so that catalog searches can use
  WordPress meta queries.
- If the option to automatically add products to the channel is disabled,
  it will be honored even on the initial import when the channel has no
  products.
- Removed product pick list options for products that are out of stock.
- Changed how option and modifier fields are rendered and treated on
  the product single and Quick View modals. Modifiers using select/radio
  fields are now supported, using the same templates as the option fields.
  
  **NOTE:** Please take note of the changes to the option field templates and
  adjust your custom templates as needed.
  
  `components/modifier-types/modifier-checkbox.php` → `components/option-types/option-checkbox.php`
  
  `components/modifier-types/modifier-date.php` → `components/option-types/option-date.php`
  
  `components/modifier-types/modifier-number.php` → `components/option-types/option-number.php`
  
  `components/modifier-types/modifier-text.php` → `components/option-types/option-text.php`
- The template `components/cart/cart-actions.php` now takes an array of
  rendered `$actions` that will be echoed into the template.
- The template `components/products/product-card.php` requires a new
  attribute on the Quick View template wrapper: `data-quick-view-script=""`

### Fixed
- Fixed a typo on the Create New Account screen during on-boarding
- Fixed an issue with Quick View modal boxes in product cards where removing 
  the quick-view feature would break the JS and the page.
- The nonce for an ajax import request is validated before triggering the
  import cron action.
- Fixed an extra quote rendered in template wrappers.
- Fixed Flatpickr library issue with quick-view modal. **NOTE:** This changes the position
  of the date picker to inline with the date field. Update your CSS as needed.
  
### Deprecated
- The `modifiers` parameter to the cart REST controller is no longer used
  and will be removed in a future version.
- The `modifiers` variable in the template `components/products/product-form.php`
  is no longer used and will be removed in a future version.
- The template `components/products/product-modifiers.php` is no longer used.


## [1.6.0]

### Added
- Added a Menu Setup screen to the onboarding flow, giving merchants an
  opportunity to quickly add BigCommerce menu items to their navigation menu.
- A "Start Over" button is available in the onboarding screens, enabling
  the merchant to go back to the beginning of the account connection process.
- All option caches are flushed before and after running an import batch
  to avoid cache corruption from longer-running processes.
- The import log records more extensive debugging information. Use the
  `bigcommerce/logger/level` filter to change the logging level.
- Added hooks to render HTML inside the form tags on the plugin settings pages.
- Added child categories to the filter options in the product block/shortcode UI.

### Changed
- The import debug log moved from `uploads/logs/bigcommerce/import.log` to
  `uploads/logs/bigcommerce/debug.log`.

### Fixed
- Cleaned up a small memory leak in the product block/shortcode UI pagination.
- Fixed the check for an expired import lock when running an import via ajax.
- Fixed arguments to Channel Listings API requests to ensure that all products
  are returned even with larger batch sizes.
- Fixed a fatal error when intializing an import on PHP 7.0+.


## [1.5.0]

### Added
- The product selection popup in the admin for the products shortcode/Gutenberg
  block will now load additional pages of products as you scroll past the initially
  loaded products matching your query.
- When completing an embedded checkout, the customer's cart cookie is now
  cleared out so the cart menu item no longer shows items in the cart.
- Product Categories and Brands have new dynamic nav menu items to show top
  level terms in those taxonomies.
- Added synchronization back to BigCommerce when updating the Google Analytics
  tracking ID when GAEE is enabled.
- Added product categories and thumbnails to the admin list table for Products.
- Product Categories and Brands are visible (but not editable) in the WordPress admin.

### Fixed
- Fixed a JavaScript console error when initializing Gutenberg blocks, when
  some of those blocks should be disabled.
- Fixed the broken cancel button when reloading the customer address form
  after validation errors.
- Fixed styles in the products Gutenberg block, because WordPress doesn't
  call it Gutenberg anymore.
- Fixed broken synchronization of Facebook Pixel configuration between WordPress
  and BigCommerce.
- The product sync should no longer show a success message if an import failed.
- Fixed the featured image displayed for gift certificates in a customer's order history.
- Removed the "Required" asterisk from the Company Name field in the address form.
  It is not, in fact, required.

### Changed
- Changed the polling logic for the product import to prevent running multiple
  requests at the same time from a single browser window.
- The Product Category dropdown on the Products archive will now show hierarchical
  terms nested under their parents.


## [1.4.2]

### Fixed

- Fixed inconsistent defaults for ajax cart setting.

## [1.4.1]

### Fixed

- Fixed PHP fatal error that would occur intermittently when adding items
  to the cart.

## [1.4.0]

### Added

- On sites where the official AMP plugin for WordPress is active and SSL is not enabled,
  added an admin notice on the settings page informing users some features won't work
  correctly without HTTPS.
- In AMP, added cart item count indicator to nav menu item linking to Cart page
- Option to use Ajax to add products to the customer's cart
- Added the BigCommerce product ID to the products list in the WordPress admin
- Option to control the import batch size

### Fixed

- Fixed icons not loading correctly in AMP templates.
- Fixed as issue with product variants not working on single product shortcodes.
- Fixed an issue with field labels and IDs colliding when products are duplicated on
  the same page. All clicks would control the first product on the page.
- Fixed click behavior on product galleries
- Fixed bug allowing an import to start (and fail) before setting up a channel
- Fixed 1970 dates showing on order history when orders had not been shipped
- Fixed bug that ignored the minimum quantity requirements when adding a product to the cart
  from a product card.
- Fixed an issue with pagination ajax on shortcode product groups.

### Changed

- Updated BigCommerce v3 API client library to version 1.3.0. Parameters
  have changed on most methods to accept an array of arguments instead of
  a long parameter list.
- Refactored import task registration to use a filterable list. Instances
  of `Task_Definition` should be registered with the `Task_Manager` with an
  appropriate priority to control the order of operations.
- Changed the action that triggers each step of the import. It now uses the
  `bigcommerce/import/run` hook, with the current status as the first parameter,
  replacing the former `bigcommerce/import/run/status={$current_status}`.
- Separated category and brand imports into separate import steps, allowing
  for bulk queries and reducing the number of API requests required to import
  a product.
- Reorganized classes related to the API import process.

## [1.3.0]

### Added

- Added templates, styles, and plugin logic for compatibility with the Official AMP
  Plugin for Wordpress, through version 1.0. Themes still need to be made AMP-compatible
  if not using AMP classic mode.
- Added REST endpoints to proxy several BigCommerce API endpoints, including catalog,
  channels and cart. Most requests are cached for ten minutes by default.
- Added creation and handling of a BigCommerce webhook to bust cached proxy data
  related to a product when the product is updated in BigCommerce.

## [1.2.0]

### Added

- Product prices will update dynamically to reflect the price of the selected variant.
- Reintroduced the ability to set API credentials without using the connector app.
- Added logs for import errors, viewable through the plugin diagnostics section
  on the plugin settings screen.
- Added support for links directly to product variants.
- The import process will continue to run via ajax requests while an admin is
  on the plugin settings screen. This can speed up import processing on sites
  that depend on WordPress cron jobs for the import.

### Changed

- Refactored Gutenberg block registration to re-use code and allow more
  configuration when registering the blocks in PHP.
- Font sizes use relative units instead of pixels.
- Increased quantity field width to accommodate three digits.

### Fixed

- Fixed compatibility with newer (4.4+) versions of Gutenberg.
- Updated the `$_COOKIE` superglobal immediately on setting the cart cookie.
- Fixed a PHP error when the BigCommerce tax class API returns an invalid value.
- Added decimal precision to price sorting queries, fixing sorting for products
  that round to the same integer value.
- Improved accessibility and keyboard navigation on the plugin settings screen.

## [1.1.0]

### Added

- Created a new template tag, shortcode, and block for displaying product reviews.
  Shortcode usage: `[bigcommerce_reviews id={product ID}]`. Template tag
  usage: `echo \BigCommerce\Functions\product_reviews( $product_id );`
- Added a plugin diagnostics section to the settings screen.
- Added a static method to retrieve a Product object by product ID. Usage:
  `$product = \BigCommerce\Posts_Types\Product\Product::by_product_id( $product_id );`

### Changed

- Template may now have a wrapper HTML element that cannot be modified with
  a template override. This wrapper is defined in the template controller
  class associated with the template. Filters `bigcommerce/template/wrapper/tag`,
  `bigcommerce/template/wrapper/classes`, and `bigcommerce/template/wrapper/attributes`
  are available to modify this wrapper. Modification may break JavaScript
  provided by the plugin. We have added comments next to other HTML
  elements that are required to maintain JS functionality.

### Fixed

- Better error handling when the OAuth connector gives unexpected responses.

## [1.0.2]

### Changed

- Added even more sanitization to meet wordpress.org plugin review guidelines

## [1.0.1]

### Changed

- Added an additional layer of sanitization to all user input to meet wordpress.org
  plugin review guidelines
- Replaced bundled jQuery with calls to WordPress's default jQuery

## [0.15.0]

### Added

- Automatically add new products to the BigCommerce channel on next import

### Fixed

- Fixed an error in channel initialization that limited channels to the first 100 products

### Removed

- Removed the missing SSL notice from the admin. Instead, a smaller notice is
  displayed next to the Embedded Checkout option, explaining why it is disabled.

## [0.14.0]

### Added

- Introduced embedded checkout, with an option in the admin to disable it.

### Fixed

- Fixed a typo in the order summary template path. Order history should load correctly now.
- Replaced obsolete information regarding API credentials in the plugin readme.

## [0.13.0]

### Added
- Created account creation and authentication process
- Required creation of a Channel before importing products
- Added two-way sync for Product post status, title, and description with the linked Channel
- Added support for the BigCommerce Sites & Routes API
- Added admin notice when the BigCommerce account is not sufficiently configured to support checkout

### Changed
- Refactored the Cart template into several smaller components
- Moved theme templates from `public-views` to `templates/public`
- Organized theme templates into subdirectories
- Moved admin templates from `admin-views` to `templates/admin`
- Refreshed the list of countries and states used in address forms
- Updated BigCommerce PHP API to version 0.13.0
- Refactored template controller instantiation to add additional filtering for both the path and the controller class.
- Refactored settings sections into the namespace `BigCommerce\Settings\Sections`
- Refactored settings screens into the namespace `BigCommerce\Settings\Screens`
- Changed checkout login token generation to use the OAuth connector API

### Removed
- Removed the API Credentials settings section. All authentication should now go through the OAuth authentication process.
- Removed ability to edit Product post slug. The slug is imported from the Catalog API.
- Removed the Import Settings metabox obviated by the Channels API.

### Fixed
- Fixed the cart tax total to refresh when cart quantities change.

## [0.12.0]
### Added
- Added the Product Sync feature to Product List page.
- Added Welcome screen and Connect Account screen.

### Changed
- Refactored JS code in Gutenberg modules to use ES6 React syntax (removes usage of `wp` global React wrapper).
- Refactored other JS modules for extendability and moved i18n strings to PHP JS_Config.
- Reorganized JS modules and structure for easier readability.
- Added a new indicator in the Gutenberg products block to let the user know if they chose filters that produce no results.
- Added support for displaying estimated tax amounts in the cart.
- Refactored Analytics data tags to utilize Segment Analtyics.js script.
- Improved focus pointer UX elements when editing the product block.
- Rendered redesigned panels in Settings UI.
- Refactored settings screen registration and rendering.
- Prevented editing API credential settings if they are set using constants or environment variables.

### Removed
- Replaced GA/Pixel controller with Segment controller.

### Fixed
- Fixed a bug with the Gutenberg editor where the Featured filter was not showing up when reopening a saved block.
- Fixed a bug with the cart template where product removal was canceled by a missing template node.
- Fixed a bug with the cart where updating product qty was updating the remote cart but the API response changed causing an ajax error.
- Fixed a bug with product pages where  product review body text was not showing. Existing products should be re-imported to show reviews.
- Fixed an issue with the admin Products UI where default settings were not being applied when using the classic editor.

## [0.11.1] - 2018-08-28
### Fixed
- Remove reference to `Id` from the Gutenberg blocks `props` Object which was deprecated in version 3.3. Replaced with new key `clientId`.

## [0.11.0] - 2018-08-27
### Added
- Changelog
- Support for most product modifier field types: checkbox, date, number,
  single line text, multi line text
- Quantity field for the Add to Cart form
- Shim for the function wp_unschedule_hook(), which is not available on
  WordPress versions older than 4.9.0
- Updates to the uninstaller to account for data added in recent releases

### Changed
- Combined the "Product Archive" and "Product Catalog" sections in the theme customizer
- Updated the BigCommerce API SDK to bring it up-to-date with current API behavior.
  API classes formerly in the `BigCommerce\Api\v3` namespace have moved to
  `BigCommerce\Api\v3\Api`.
- When changing the import schedule, the next import is immediately rescheduled,
  instead of waiting until the next import runs.
- When running an import via CLI, reschedule the next cron import after
  the CLI import completes.

### Removed
- The class `BigCommerce\Customizer\Sections\Catalog` is gone. Its constants
  have moved to `BigCommerce\Customizer\Sections\Product_Archive`.

## [0.10.0] - 2018-08-03
### Added
- Rendering of form error messages that do not correspond to specific fields
- Timeout handling for "Load More" buttons
- Fallback image for gift certificates in cart and order history
- Automatically create Shipping & Returns page
- Placeholder graphics for all Gutenberg blocks
- Links to product pages from cart and order history
- Product review pagination
- Display option swatches with images or multiple colors
- Link from WordPress admin to BigCommerce admin to manage product reviews
- Option to disable reviews on a product, tied to WordPress's comment toggle

### Changed
- Product gallery thumbnail images will wrap after four thumbnails

### Fixed
- Render inline content for newly-created product blocks

## [0.9.0] - 2018-07-19
### Added
- Import product reviews and render on product pages
- Product review form
- Gift certificate purchasing
- Automatically create page for purchasing gift certificates, with the
  new shortcode `[bigcommerce_gift_form]`
- Automatically create page for checking gift certificate balances, with
  the new shortcode `[bigcommerce_gift_balance]`
- Settings for Facebook Pixel and Google Analytics tracking IDs
- Automatic import of Facebook Pixel and Google Analytics tracking IDs from
  the BigCommerce store
- Two-way sync of Facebook Pixel tracking code with the BigCommerce store
- Render Facebook Pixel and Google Analytics tracking codes
- Tracking for add to cart and view product events
- Settings for ordering and pagination in the product shortcode/block interface

### Fixed
- Manually reset the global `$post`, because `wp_reset_postdata()` does not,
  in fact, reset postdata, so far as Gutenberg 3.2.0 is concerned.


[Unreleased]: https://github.com/moderntribe/bigcommerce/compare/master...develop
[3.1.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/3.0.2...3.1.0
[3.0.2]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/3.0.1...3.0.2
[3.0.1]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/3.0.0...3.0.1
[3.0.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/2.2.1...3.0.0
[2.2.1]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/2.2.0...2.2.1
[2.2.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/2.1.0...2.2.0
[2.1.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/2.0.1...2.1.0
[2.0.1]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/2.0.0...2.0.1
[2.0.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.6.0...2.0.0
[1.6.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.5.0...1.6.0
[1.5.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.4.2...1.5.0
[1.4.2]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.4.1...1.4.2
[1.4.1]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.4.0...1.4.1
[1.4.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.3.0...1.4.0
[1.3.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.2.0...1.3.0
[1.2.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.1.0...1.2.0
[1.1.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.0.2...1.1.0
[1.0.2]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/1.0.1...1.0.2
[1.0.1]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.15.0...1.0.1
[0.15.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.14.0...0.15.0
[0.14.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.13.0...0.14.0
[0.13.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.12.0...0.13.0
[0.12.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.11.1...0.12.0
[0.11.1]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.11.0...0.11.1
[0.11.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.10.0...0.11.0
[0.10.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.9.0...0.10.0
[0.9.0]: https://github.com/bigcommerce/bigcommerce-for-wordpress/compare/0.8.0...0.9.0
