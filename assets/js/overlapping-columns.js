wp.blocks.registerBlockVariation(
  'core/columns', {
    name: 'overlapping-img-columns-right',
    title: 'Overlapping Image Columns (right)',
    scope: ['inserter'],
    attributes: { 
      className: 'is-style-overlapping is-style-overlapping-right'
    },
    innerBlocks: [
      ['core/column', {}, [
        ['core/image', {}]
      ]],
      ['core/column', {}, [
        ['core/heading', { level: 2, placeholder: 'Overlapping heading here' }],
      ]]
    ]
  }
);
wp.blocks.registerBlockVariation(
  'core/columns', {
    name: 'overlapping-img-columns-left',
    title: 'Overlapping Image Columns (left)',
    scope: ['inserter'],
    attributes: { color: 'blue', className: 'is-style-overlapping is-style-overlapping-left' },
    innerBlocks: [
      ['core/column', {}, [
        ['core/heading', { level: 2, placeholder: 'Overlapping heading here' }],
      ]],
      ['core/column', {}, [
        ['core/image', {}]
      ]]
    ]
  }
);