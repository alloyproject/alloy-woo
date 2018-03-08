# Alloy WooCommerce Extension

Contributor: Brador2000

Donate: A2vpi4ZNx31jR8C4VKAvLTRzBVgVgbFYKb7vn7kLFTccW8ngsTqiWYSWEtoo2NU9xEAgS9kgztzsRM9fLagxTCE8V4oQDm5

Tags: alloy, woocommerce, integration, payment, merchant, cryptocurrency, accept alloy, alloy woocommerce

Requires at least: 4.0

Tested up to: 4.9.4

Stable tag: trunk

License: GPLv3 or later

License URI: http://www.gnu.org/licenses/gpl-3.0.html

Alloy WooCommerce Extension is a WordPress plugin that allow merchants to accept Alloys as payments on WooCommerce-powered online stores.

**Description**

Your online store must use the WooCommerce platform (free wordpress plugin).
Once you have installed and activated WooCommerce, you can then install and activate the Alloy WooCommerce Extension.

**Benefits**

* Add Alloy payments option to your existing online store.
* Accept payment directly into your own Alloy wallet.
* Accept payment in Alloy for physical and digital downloadable products.
* Automatic conversion to Alloy via realtime exchange rate feed and calculation via TradeOgre.com.

**Requirements**

1. Walletd running fully synced as a daemon or service on the server that is hosting WordPress.
   * On Linux the command to run your instance is as follows:
   
     ```./walletd -d -w woowallet.wallet -p YourPassword --local```
   * This means that you have complete control over the server and it is not a multi-tenant WordPress host.
   * You **must** have console and root access to the OS.
2. Recommended: The wallet running on the server hosting WordPress has a unique Alloy wallet address that is only for accepting payments and you regularly transfer money out of that wallet address to another Alloy wallet address you control.

**Installation**

1. Download the zip file from releases.
2. Change the name of the file from woocommerce-alloy-gateway.*version*.zip to woocommerce-alloy-gateway.zip.
3. It must be woocommerce-alloy-gateway.zip otherwise there will be broken paths after installation.
4. Install woocommerce-alloy-gateway.zip file in WordPress just like any other plugin.
5. Activate the plugin.
6. You will see the plugin installed as "WooCommerce Alloy Checkout Gateway"
7. Configure the options page with your local Alloy wallet address, The IP or Host Name of the server running walletd (Right now that is ONLY the localhost as per Requirements; username or password not requested in the plugin), port number ofr RPC requests. 

**Remove plugin**

1. Deactivate plugin through the 'Plugins' menu in WordPress
2. Delete plugin through the 'Plugins' menu in WordPress

**Screenshots**

1. screenshot1.png - Alloy Checkout Gateway options page
2. screenshot2.png - transaction in progress
3. screenshot3.png - payment received and confirmed

**Changelog**

= 0.1 =
* Release!

**Upgrade Notice**

soon

**Frequently Asked Questions**

1. The instructions don't tell me how to setup walletd locally on my server; just that it is required.
   How do I install and configure walletd?

   That is covered here: https://github.com/alloyproject/alloy
   
2. I have encountered the following message on the plugin options page:

   ```Your Alloy Address doesn't seem valid. Have you checked it?```
   
   What does this mean?
   
   Alloy addresses are 95 characters long. The plugin can't know if your address is correct but it does check for you to make sure that it didn't get truncated it when it was copied and pasted.
   
3. I have encountered the following message on the plugin options page:

   ```
   [ERROR] Failed to connect to alloy-wallet-rpc at localhost port 8070
   Invalid response data structure: Request id: 1 is different from Response id
   Your available balance is: Not Avaliable
   Locked balance: Not Avaliable
   ```
   
   What does this mean?
   
   It means that the plugin can't communicate with the walletd RPC API to get the info it needs and you need to troubleshoot walletd.
   
4. How do I know that an order has been paid for and the customer didn't just close the page after indicating they were paying with Alloy (XAO) and placing the order?

   Check the Orders page in WooCommerce. If an order status is "On hold" it has not been paid for.
