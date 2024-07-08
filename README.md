# Ciandt_CustomAttribute module
## Guide install

### Step 1: Set Up the Magento 2 Instance

Clone the repository to your local machine.
git clone https://github.com/ingedicson/Magento_CustomAttribute.git

### Step 2: Enable and Configure the Module

1. Enable the Module: Enable the Ciandt_CustomAttribute module.
bin/magento module:enable Ciandt_CustomAttribute

2. Run Commands: Execute the necessary commands to ensure the module is fully configured.
bin/magento setup:upgrade
bin/magento setup:static-content:deploy -f
bin/magento cache:clean
bin/magento cache:flush

### Step 3: Test the Module

1.Access the Magento Backend: Open your browser and access the Magento admin panel. The default URL will be something like http://your_website/admin.
Log in with the admin credentials you set during installation.

2. Verify the Custom Attribute Configuration: Navigate to Stores > Configuration.
Look for the Custom Attribute section and verify that the Enable Custom Attribute option is available and enabled.

3. Edit a Product and Assign the Custom Attribute: Navigate to Catalog > Products.
Edit one of the products and verify that the Custom Product Attribute field is available in the product details section.
Assign a value to this attribute and save the product.

4. Verify the Attribute on the Frontend: Open the frontend of your website and navigate to the product page that you edited.
Verify that the custom attribute is displayed correctly on the product page.

5. Test the Console Command: Open a terminal and run the following command to update the custom attribute value for all products:
bin/magento custom:attribute:update "New Value"
Verify that the custom attribute value has been updated correctly for all products.

6. Verify the Attribute in the Backend Product Grid: Navigate to Catalog > Products.
Verify that the Custom Product Attribute column is displayed in the product grid and that the values are correctly shown for each product.

### Approach to Solving Each Requirement

1. Magento Setup
We set up a Magento 2 instance in the local environment and provided detailed instructions for accessing the instance.
2. Module Creation
We created a custom module named Ciandt_CustomAttribute, registered it in the app/code/Ciandt/CustomAttribute directory, and ensured it was enabled and registered correctly in Magento.
3. Add Custom Product Attribute
We added a new product attribute called custom_product_attribute as a text field, managed via a console command, and displayed on the frontend product detail page.
4. Modify Product Detail Page
We modified the product detail page template to display the value of custom_product_attribute in a user-friendly manner.
5. Create Custom Console Command
We created a custom console command that updates the custom_product_attribute value for all products, registered it, and made it executable via the Magento CLI.
6. Implement JavaScript Validation
We added a text input field for custom_product_attribute on the product detail page and implemented JavaScript validation to ensure the input value meets specific criteria.
7. Add Feature Toggle Functionality
We implemented a feature toggle to enable or disable the custom_product_attribute functionality based on different regions or configurations, controlled via a console command.
8. Extend Magento Core Functionality
We extended a Magento UI Component to integrate with the custom attribute, adding the custom_product_attribute as a column in the product listing UI component.

### Summary
Each requirement was approached with a focus on modularity, configurability, and maintainability, ensuring that the Ciandt_CustomAttribute module integrates seamlessly with Magento 2 and provides the desired functionality.