( function( wp ) {
    var registerBlockType = wp.blocks.registerBlockType;
    var TextControl = wp.components.TextControl;
    var el = wp.element.createElement;

    const iconEl = el('svg', { class: 'quinbook_logo', width: 20, height: 20, viewBox: "0 0 241 243", fill: "none", xmlns: "http://www.w3.org/2000/svg" },
        el('path', { d: "M25.5 178.5L86.5 148.5L93 215.5", stroke: "#8497A8", 'stroke-width': "16", 'stroke-linecap': "round" }),
        el('path', { d: "M35.0782 59.5425L82.9233 107.832L21.4707 135.306", stroke: "#8497A8", 'stroke-width': "16", 'stroke-linecap': "round" }),
        el('path', { d: "M157.445 35.1374L125.163 94.961L81.0001 44.1587", stroke: "#8497A8", 'stroke-width': "16", 'stroke-linecap': "round" }),
        el('path', { d: "M219.584 136.819L152.347 126.81L185.099 67.9999", stroke: "#8497A8", 'stroke-width': "16", 'stroke-linecap': "round" }),
        el('path', { d: "M136.587 228.419L126.502 161.194L192.317 175.322", stroke: "#271962", 'stroke-width': "16", 'stroke-linecap': "round" })
    );
    
    registerBlockType( 'custom/quinbook-block', {
        title: 'Quinbook',
        category: 'common',
        icon: iconEl,
        attributes: {
            shopID: {
                type: 'string',
                default: '',
            },
        },
        edit: function( props ) {
            var shopID = props.attributes.shopID;
            var onChangeShopID = function( newShopID ) {
                props.setAttributes( { shopID: newShopID } );
            };

            return el(
                TextControl,
                {
                    label: 'Shop ID',
                    value: shopID,
                    onChange: onChangeShopID,
                }
            );
        },
        save: function( props ) {
            return el( 'script', {
                src: 'https://cdn.quinbook.com/shop.js',
                'data-shopid': props.attributes.shopID,
            } );
        },
    } );
} )( window.wp );
