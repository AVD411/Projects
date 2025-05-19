import React, { useEffect, useState } from "react";
import axios from "axios";

function App() {
  const [form, setForm] = useState({
    name: "",
    math: [0, 0],
    physics: [0, 0],
    dbms: [0, 0],
    os: [0, 0]
  });
  const [students, setStudents] = useState([]);
  const [editId, setEditId] = useState(null);

  const fetchStudents = () => {
    axios.post("http://localhost/WT Assignment/Results/fetch.php").then(res => {
      setStudents(res.data);
    });
  };

  useEffect(() => {
    fetchStudents();
  }, []);

  const handleChange = (subject, index, value) => {
    const updated = [...form[subject]];
    updated[index] = Number(value);
    setForm({ ...form, [subject]: updated });
  };

  const handleSubmit = () => {
    const url = editId
      ? "http://localhost/WT Assignment/Results/update.php"
      : "http://localhost/WT Assignment/Results/insert.php";
    const payload = editId ? { ...form, id: editId } : form;
    axios.post(url, payload).then(() => {
      fetchStudents();
      setForm({ name: "", math: [0, 0], physics: [0, 0], dbms: [0, 0], os: [0, 0] });
      setEditId(null);
    });
  };

  const handleEdit = (s) => {
    setForm({
      name: s.name,
      math: [s.math_mse, s.math_ese],
      physics: [s.physics_mse, s.physics_ese],
      dbms: [s.dbms_mse, s.dbms_ese],
      os: [s.os_mse, s.os_ese]
    });
    setEditId(s.id);
  };

  const handleDelete = (id) => {
    axios.post("http://localhost/WT Assignment/Results/delete.php", { id }).then(() => {
      fetchStudents();
    });
  };

  return (
    <div className="container mt-4">
      <h2>VIT Semester Result</h2>
      <div>
        <input placeholder="Name" value={form.name} onChange={e => setForm({ ...form, name: e.target.value })} />
        {["math", "physics", "dbms", "os"].map(sub => (
          <div key={sub}>
            {sub.toUpperCase()} MSE:
            <input type="number" value={form[sub][0]} onChange={e => handleChange(sub, 0, e.target.value)} />
            ESE:
            <input type="number" value={form[sub][1]} onChange={e => handleChange(sub, 1, e.target.value)} />
          </div>
        ))}
        <button className="btn btn-primary mt-2" onClick={handleSubmit}>{editId ? "Update" : "Add"}</button>
      </div>

      <hr />
      <table className="table">
        <thead>
          <tr>
            <th>Name</th><th>SDAM</th><th>DAA</th><th>DBMS</th><th>OS</th><th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {students.map(s => (
            <tr key={s.id}>
              <td>{s.name}</td>
              <td>{(s.sdam_mse * 0.3 + s.sdam_ese * 0.7).toFixed(2)}</td>
              <td>{(s.daa_mse * 0.3 + s.daa_ese * 0.7).toFixed(2)}</td>
              <td>{(s.dbms_mse * 0.3 + s.dbms_ese * 0.7).toFixed(2)}</td>
              <td>{(s.os_mse * 0.3 + s.os_ese * 0.7).toFixed(2)}</td>
              <td>
                <button className="btn btn-sm btn-warning" onClick={() => handleEdit(s)}>Edit</button>
                <button className="btn btn-sm btn-danger" onClick={() => handleDelete(s.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default App;
