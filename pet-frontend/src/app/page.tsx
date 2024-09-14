import Link from "next/link";
import { FaArrowRightToBracket } from "react-icons/fa6";
import { RxDashboard } from "react-icons/rx";

export default function Home() {
  return (
    <div className="h-screen flex items-center justify-center space-x-2">
      <Link href="/login">
        <button type="button" className="btn btn-primary">
          <FaArrowRightToBracket /> LogIn
        </button>
      </Link>

      <Link href="/app">
        <button type="button" className="btn btn-primary">
          <RxDashboard /> App
        </button>
      </Link>
    </div>
  );
}
