const express = require("express");
const app = express();
const path = require("path");

app.use(express.static(path.join(__dirname, "public")));
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.post("/calculate", (req, res) => {
  const units = parseFloat(req.body.units);
  let bill = 0;

  if (units <= 50) bill = units * 3.5;
  else if (units <= 150) bill = 50 * 3.5 + (units - 50) * 4;
  else if (units <= 250) bill = 50 * 3.5 + 100 * 4 + (units - 150) * 5.2;
  else bill = 50 * 3.5 + 100 * 4 + 100 * 5.2 + (units - 250) * 6.5;

  res.json({ bill: bill.toFixed(2) });
});

const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});
