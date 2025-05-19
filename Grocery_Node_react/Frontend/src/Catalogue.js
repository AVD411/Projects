import { useState, useEffect } from 'react';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
import './Catelogue.css';


function Catalogue() {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    axios.get('http://localhost:5000/catalogue')
      .then(res => setProducts(res.data))
      .catch(err => console.log(err));
  }, []);

  return (
    <div className="container">
      <h2 className="text-center mb-4">Product Catalogue</h2>
      <div className="row justify-content-center gap-4">
        {products.map(p => (
          <div className="card club-card" style={{ height: "300px" , objectFit: "cover" }} key={p.id}>
            {p.image && <img src={p.image} className="card-img-top" alt={p.name} style={{ height: "180px", marginTop: "20px" , objectFit: "cover" }} />}
            <div className="card-body">
              <h5 className="card-title">{p.name}</h5>
              <p className="card-text">Price: ₹{p.price}</p>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

export default Catalogue;
