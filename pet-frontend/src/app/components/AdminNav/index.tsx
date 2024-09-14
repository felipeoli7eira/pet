import Link from "next/link";

import { RiHome2Line } from "react-icons/ri";
import { GoChecklist } from "react-icons/go";
import { PiUsersDuotone } from "react-icons/pi";
import { MdOutlinePets } from "react-icons/md";
import { PiSignOut } from "react-icons/pi";
import React from "react";

export default function AdminNavComponent(): React.ReactNode {
    const LINK_SIZE_ICON = 20;

    return (
        <div className="w-20 flex flex-col justify-between p-3 py-5 overflow-y-auto overflow-x-hidden">
            <div className="flex flex-col items-center justify-self-center self-center space-y-1">
                <Link href="/app" className="btn btn-primary">
                    <RiHome2Line size={LINK_SIZE_ICON} />
                </Link>

                <Link href="/app/consultas" className="btn btn-primary">
                    <GoChecklist size={LINK_SIZE_ICON} />
                </Link>

                <Link href="/app/clientes" className="btn btn-primary">
                    <PiUsersDuotone size={LINK_SIZE_ICON} />
                </Link>

                <Link href="/pets" className="btn btn-primary">
                    <MdOutlinePets size={LINK_SIZE_ICON} />
                </Link>
            </div>

            <button type="button" className="btn btn-primary">
                <PiSignOut size={LINK_SIZE_ICON} />
            </button>
        </div>
    )
}
