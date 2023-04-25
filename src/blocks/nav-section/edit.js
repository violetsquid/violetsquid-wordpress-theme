/**
 * useBlockProps is a React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 *
 * RichText is a component that allows developers to render a contenteditable input,
 * providing users with the option to format block content to make it bold, italics,
 * linked, or use other formatting.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/richtext/
 */
import { useBlockProps, RichText, innerBlocks } from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';
import { __ } from '@wordpress/i18n';
import { InnerBlocks, ColorPalette, InspectorControls, PanelBody } from "@wordpress/block-editor";


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @param {Object}   param0
 * @param {Object}   param0.attributes
 * @param {string}   param0.attributes.message
 * @param {Function} param0.setAttributes
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes: { message, header }, setAttributes } ) {

	const onChangeBGColor = ( newMessage ) => {
		setAttributes( { message: newMessage } );
	};

	const onChangeTextColor = ( newMessage ) => {
		setAttributes( { message: newMessage } );
	};


	return (
		<div { ...useBlockProps() } class="vsqd-dynamic-page-header">
                <InspectorControls key="setting">
					<fieldset>
                        <legend className="blocks-base-control__label">
                            { __( 'Text' ) }
                        </legend>
                        <RichText // Element Tag for Gutenberg standard colour selector
							value={ message }
                            onChange={ onChangeTextColor } // onChange event callback
                        />
                    </fieldset>
                </InspectorControls>
			<div class="content-container">
				<h2>{ message }</h2>
				< InnerBlocks />
			</div>
		</div>
	);
}

  