(function( $ ) {
    $(  '.cmb2-id-wpforo-points-types .cmb2-list,' +
        ' .cmb2-id-wpforo-achievement-types .cmb2-list,' +
        ' .cmb2-id-wpforo-rank-types .cmb2-list'
    ).sortable({
        handle: 'label',
        placeholder: 'ui-state-highlight',
        forcePlaceholderSize: true,
    });
})( jQuery );