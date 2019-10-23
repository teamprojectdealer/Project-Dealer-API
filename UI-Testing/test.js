// test.js
// Import requirement packages
require('chromedriver');
const assert = require('assert');
const {Builder, Key, By, until} = require('selenium-webdriver');
describe('Login Testing', function () {
    let driver;
    before(async function() {
        driver = await new Builder().forBrowser('chrome').build();
    });

    it('Entering unregistered username and password', async function() {
        // Load the page
        await driver.get('http://localhost/Project-Dealer/login.php');

        //send username and password to corresponding fields
        await driver.findElement(By.name('username')).sendKeys('invalidun');
        await driver.findElement(By.name('password')).sendKeys('invalidps');

        //trigger login button click
        await driver.findElement(By.name('loginBtn')).click();

        // We will get the title value and test it
        //if title is home title then login success else failed
        let title = await driver.getTitle();
        assert.equal(title, 'Login | Online Project Dealer');
    });


    it('Entering registered username and password', async function() {
        // Load the page
        await driver.get('http://localhost/Project-Dealer/login.php');

        //send username and password to corresponding fields
        await driver.findElement(By.name('username')).sendKeys('teamprojectdealer');
        await driver.findElement(By.name('password')).sendKeys('teamprojectdealer');

        //trigger login button click
        await driver.findElement(By.name('loginBtn')).click();

        // We will get the title value and test it
        //if title is home title then login success else failed
        let title = await driver.getTitle();
        assert.equal(title, 'Home | Online Project Dealer');
    });

    // close the browser after running tests
    // after(() => driver && driver.quit());
})