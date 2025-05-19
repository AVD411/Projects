import { Link } from "react-router-dom";

function Home() {
  return (
    <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-100 to-white p-6">
      <div className="bg-white shadow-xl rounded-3xl p-8 w-full max-w-md text-center">
        <h1 className="text-3xl font-bold text-green-700 mb-4">Welcome to Books Shop 🛒</h1>
        <p className="text-gray-600 mb-6">
          Your one-stop solution for fresh groceries delivered to your doorstep.
        </p>

        <div className="flex flex-col gap-4">
          <Link
            to="/login"
            className="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-xl transition"
          >
            Login
          </Link>
          <Link
            to="/register"
            className="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-xl transition"
          >
            Register
          </Link>
          <Link
            to="/catalogue"
            className="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-xl transition"
          >
            View Catalogue
          </Link>
        </div>

        {/* <div className="mt-8">
          <img
            src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png"
            alt="Groceries"
            className="w-20 mx-auto"
          /> */}
        {/* </div> */}
      </div>
    </div>
  );
}

export default Home;
