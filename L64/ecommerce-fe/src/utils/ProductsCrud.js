/**
 * Class for managing CRUD operations on products
 * @class CrudProducts
 */
export default class CrudProducts {

    static apiUrl = 'http://localhost:8000/api/product';


    static async getAllProducts() {
        const response = await fetch(this.apiUrl);
        const data = await response.json();
        return data;
    }


    static async getProductById(id){
        const response = await fetch(`${this.apiUrl}/${id}`);
        const data = await response.json();
        return data;
    }

   
    static async createProduct(newProduct){
        const response = await fetch(this.apiUrl,{
            method:'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(newProduct)
        });
        const data = await response.json();
        return data;
    }

   
    static async editProduct(product){
        const response = await fetch(`${this.apiUrl}/${product.id}`,
            {
                method:'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(product)
            }
        );
        const data = await response.json();
        return data;
    }

   
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