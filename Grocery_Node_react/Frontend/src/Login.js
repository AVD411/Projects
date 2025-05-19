import { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  const handleLogin = () => {
    axios.post('http://localhost:5000/login', { email, password })
      .then(res => {
        alert(res.data.message);
        navigate('/catalogue');
      })
      .catch(err => alert(err.response.data.message));
  };

  return (
    <div style={{
      width: '50em',
      height: '20em',
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
        <h1>Login</h1>
        <input style={{width : '200px',height : '25px'}} type="text" placeholder="Email" onChange={e => setEmail(e.target.value)} /><br /><br />
        <input style={{width : '200px',height : '25px'}} type="password" placeholder="Password" onChange={e => setPassword(e.target.value)} /><br /><br/>
        <button style={{width : '100px',height : '25px',backgroundColor: '#05bd3c',}} onClick={handleLogin}>Login</button>
      </div>
    </div>
  );
}
export default Login;
