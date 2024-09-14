import React from "react";

import AdminNavComponent from "../components/AdminNav";

export default function AppLAyout({ children }: Readonly<{ children: React.ReactNode }>) {
    return (
        <div className="app-layout h-screen w-screen flex">
            <AdminNavComponent />

            <main className="app-layout-body overflow-y-auto p-5 w-full h-full">
                {children}
            </main>
        </div>
    )
}
