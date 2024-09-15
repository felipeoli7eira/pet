<template>
    <div class="w-20 flex flex-col justify-between p-3 py-5 overflow-y-auto overflow-x-hidden">
        <div class="flex flex-col items-center justify-self-center space-y-1">
            <NuxtLink to="/app" class="btn btn-primary">
                <i class="pi pi-inbox"></i>
            </NuxtLink>

            <NuxtLink to="/app/consultas" class="btn btn-primary">
                <i class="pi pi-list-check"></i>
            </NuxtLink>

            <NuxtLink to="/app/clientes" class="btn btn-primary">
                <i class="pi pi-users"></i>
            </NuxtLink>
        </div>

        <button type="button" class="btn btn-primary">
            <div class="pi pi-sign-out"></div>
        </button>
    </div>
</template>
