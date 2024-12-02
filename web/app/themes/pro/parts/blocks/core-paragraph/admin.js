/*global wp*/
const { __ } = wp.i18n;
const {registerBlockStyle} = wp.blocks;

const styles = [
    {
        name: 'uppercase',
        label: __('Uppercase', 'pro')
    },
    {
        name: 'subheading',
        label: __('Subheading', 'pro')
    },
    {
        name: 'leadparagraph',
        label: __('Leadparagraph', 'pro')
    },
];

wp.domReady(() => {
    styles.forEach(style => {
        registerBlockStyle('core/paragraph', style);
    });
});