<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php 
$dates = explode(" to ", $field->original_value);
$date1 = strtotime($dates['0']);
$output = '';
if (!empty($dates['1'])) {
	$date2 = strtotime($dates['1']);

	if (date('o M j', $date1) != date('o M j', $date2)) {
		$output .= '<span>'
		. date('l, ', $date1)
		. '</span>'
		. strtoupper(date('M j', $date1)) 
		. ' – ' 
		. '<span>'
		. date('l, ', $date2)
		. '</span>'
		. strtoupper(date('M j', $date2));
	} else {
		if ($row->field_field_all_day_event['0']['raw']['value'] == 1) {
			$output .= date('l, ', $date1)
			. strtoupper(date('M j', $date1));
		} else {
			$output .= '<span>'
			. date('l, ', $date1)
			. '</span>'
			. strtoupper(date('M j', $date1)) 
			. date(', ga', $date1) 
			. ' – ' 
			. date('ga', $date2);
		}
	}
} else {
	if ($row->field_field_all_day_event['0']['raw']['value'] == 1) {
		$output .= '<span>'
		. date('l, ', $date1)
		. '</span>'
		. strtoupper(date('M j', $date1));
	} else {
		$output .= '<span>'
		. date('l, ', $date1)
		. '</span>'
		. strtoupper(date('M j,', $date1))
		. date(' ga', $date1);
	}
}
?>


<?php print $output; ?>