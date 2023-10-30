import Tagify from  '@yaireo/tagify';
const tagifyTarget = document.querySelector('input[name=tags]');
let tagify = new Tagify(tagifyTarget, {
    maxTags: 5,
    dropdown: {
        classname: "color-blue",
        enabled: 0,
        maxItems: 30,
        closeOnSelect: false,
        highlightFirst: true,
      },
})