// summary-block.js

(function (blocks, element) {
    var el = element.createElement;

    blocks.registerBlockType('your-plugin/summary-block', {
        title: 'Summary',
        icon: 'book-alt', // Replace with your desired icon
        category: 'common',
        edit: function (props) {
            return el(
                'div',
                { className: props.className },
                el('h3', {}, 'Summary'),
                el(
                    'ul',
                    { id: 'summary-list' },
                )
            );
        },
        save: function () {
            return el(
                'div',
                null,
                el('h3', {}, 'Summary'),
                el(
                    'ol',
                    { id: 'summary-list' },
                )
            );
        },
    });
})(
    window.wp.blocks,
    window.wp.element
);
