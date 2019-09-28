// eslint:recommended,
// airbnb-base

module.exports = {
    "env": {
        "browser": true,
        "es6": true
    },
    "extends": "airbnb-base",
    "globals": {
        "Atomics": "readonly",
        "SharedArrayBuffer": "readonly",
        "$": true,
        "window": true,
        "console": true,
        "e": true
    },
    "parserOptions": {
        "ecmaVersion": 2018,
        "sourceType": "module"
    },
    "rules": {
        "linebreak-style": ["error","unix" ],
        "quotes": ["error","double" ],
        "no-alert": "off", // disabled
        "class-methods-use-this": "off", // disable
        //"camelcase": ["error", {properties: "never"}]
        "camelcase": "off"
    }
};
