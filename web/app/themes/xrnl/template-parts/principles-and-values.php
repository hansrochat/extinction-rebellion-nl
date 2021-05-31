<?php
/**
 * The template part for displaying the Principles & Values
 */
?>

<?php if( have_rows('xrnl_demands_list', 'option') ): ?>
    <ol class="pl-3 counter mt-3">
    <?php while( have_rows('principles_and_values_list', 'option') ): the_row(); ?>
        <?php $pv = get_sub_field('principle_or_value'); ?>
        <li class="pl-4">
            <div class="text-green font-xr">
            <?php echo $pv['bold_text']; ?>
            </div>
            <span>
            <?php echo $pv['regular_text']; ?>
            </span>
        </li>
    <?php endwhile; ?>
    </ol>
<?php endif; ?>
