<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php
$link = (!empty($fields['ss_url'])) ? $fields['ss_url']->raw : '';
$body = (!empty($fields['ts_description'])) ? $fields['ts_description']->content : '';
$title = (!empty($fields['label'])) ?  $fields['label']->raw : '';
?>

<div class="club-row">
	<span class="blue-small-border"></span>
	<h4>
		<?php if($link) : ?>
			<a href="<?php print $link ?>" class="clib-link no-border"><?php print $title?><i></i></a>
        <?php else: ?>
		<?php print $title ?>
		<?php endif ?>
	</h4>
	<p><?php print $body ?></p>
</div>

