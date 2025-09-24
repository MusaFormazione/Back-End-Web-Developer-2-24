/**
 * Class for managing CRUD operations on products
 * @class CrudProducts
 */
export default class CrudProducts {

    static apiUrl = 'http://localhost:8000/api/product';

    /**
     * Retrieves all products from the API
     * @static
     * @async
     * @returns {Promise<Object>} Promise that resolves to the response data containing all products
     */
    static async getAllProducts() {
        const response = await fetch(this.apiUrl);
        const data = await response.json();
        return data;
    }

    /**
     * Retrieves a specific product by its ID
     * @static
     * @async
     * @param {number} id - The ID of the product to retrieve
     * @returns {Promise<Object>} Promise that resolves to the response data containing the product
     */
    static async getProductById(id){
        const response = await fetch(`${this.apiUrl}/${id}`);
        const data = await response.json();
        return data;
    }

    /**
     * Creates a new product
     * @static
     * @async
     * @param {Object} newProduct - The product data to create
     * @param {string} newProduct.name - The name of the product
     * @param {string} newProduct.description - The description of the product
     * @param {number} newProduct.price - The price of the product
     * @returns {Promise<Object>} Promise that resolves to the response data containing the created product
     */
    static async createProduct(newProduct){
        const response = await fetch(this.apiUrl,{
            method:'POST',
            body: JSON.stringify(newProduct)
        });
        const data = await response.json();
        return data;
    }

    /**
     * Updates an existing product
     * @static
     * @async
     * @param {Object} product - The product data to update
     * @param {number} product.id - The ID of the product to update
     * @param {string} [product.name] - The name of the product
     * @param {string} [product.description] - The description of the product
     * @param {number} [product.price] - The price of the product
     * @returns {Promise<Object>} Promise that resolves to the response data containing the updated product
     */
    static async editProduct(product){
        const response = await fetch(`${this.apiUrl}/${product.id}`,
            {
                method:'PUT',
                body: JSON.stringify(product)
            }
        );
        const data = await response.json();
        return data;
    }

    /**
     * Deletes a product by its ID
     * @static
     * @async
     * @param {number} id - The ID of the product to delete
     * @returns {Promise<Object>} Promise that resolves to the response data confirming deletion
     */
    static async deleteProduct(id){
        const response = await fetch(`${this.apiUrl}/${id}`,
            {
                method:'DELETE'
            }
        );
        const data = await response.json();
        return data;
    }


}