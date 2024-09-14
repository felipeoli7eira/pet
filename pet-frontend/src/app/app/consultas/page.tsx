"use client";

import Link from "next/link";

export default function Consultations() {
    return (
        <div className="">
            <h1 className="text-3xl">Consultas</h1>

            <Link href="/app/consultas/criar" className="btn btn-primary">criar consulta</Link>
            <Link href="/app/consultas/visualizar/1" className="btn btn-primary">visualizar consulta 1</Link>
        </div>
    )
}
