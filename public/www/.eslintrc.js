module.exports = {
    "env": {
        "browser": true,
        "es6": true
    },
    "extends": "eslint:recommended",
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
        "no-alert": "off",
        "prefer-destructuring": "off",
        "class-methods-use-this": "off",
        //"camelcase": ["error", {properties: "never"}]
        "camelcase": "off"
    }
};
