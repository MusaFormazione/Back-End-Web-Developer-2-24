export default class CrudProducts {

    static apiUrl = 'http://localhost:8000/api/product';

    static async getAllProducts() {
        const response = await fetch(this.apiUrl);
        const data = await response.json();
        return data;
    }


}