import { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

function Register() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  const handleRegister = () => {
    axios.post('http://localhost:5000/register', { name, email, password })
      .then(res => {
        alert(res.data.message);
        navigate('/login');
      })
      .catch(err => alert('Registration failed'));
  };

  return (
    <div style={{
      width: '50em',
      height: '25em',
      justifyContent: 'center',
      alignContent: 'center',
      textAlign: 'center',
      backgroundSize: 'cover',
      backgroundColor: '#96aad1',
      border: '2px solid #333',
      borderRadius: '20px',
      marginLeft: '35em',
      marginTop: '15em',
      paddingTop: '2em'
    }}>
      <div style={{ textAlign: "center" }}>
        <h1>Register</h1>
        <input style={{width : '200px',height : '25px'}} type="text" placeholder="Name" onChange={e => setName(e.target.value)} /><br /><br/>
        <input style={{width : '200px',height : '25px'}} type="text" placeholder="Email" onChange={e => setEmail(e.target.value)} /><br /><br/>
        <input style={{width : '200px',height : '25px'}} type="password" placeholder="Password" onChange={e => setPassword(e.target.value)} /><br /><br/>
        <button style={{width : '100px',height : '25px',backgroundColor: '#05bd3c',}} onClick={handleRegister}>Register</button>
      </div>
    </div>
  );
}
export default Register;
