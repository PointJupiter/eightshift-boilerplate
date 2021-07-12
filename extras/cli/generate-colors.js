const fs = require('fs');

const manifestFilePath = './src/Blocks/manifest.json';
const colorStyleFilePath = './assets/styles/parts/utils/_colors.scss';

const manifestDataRaw = fs.readFileSync(manifestFilePath, 'utf-8');
const manifestData = JSON.parse(manifestDataRaw);

const {
    globalVariables: {
        colors
    }
} = manifestData;

const colorStyleContent = `/*
Color variables generated from manifest file.
*/

/* stylelint-disable color-named */

${colors.map(({ slug }) => `
$${slug}: global-settings(colors, ${slug});`).join('')}`;

fs.writeFileSync(colorStyleFilePath, colorStyleContent);