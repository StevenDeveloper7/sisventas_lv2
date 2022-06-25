<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to="{ name: 'crearCliente' }" class="btn btn-success"
                ><i class="fas fa-plus-circle"></i
            ></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Edad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cliente in clientes" :key="cliente.id">
                            <td>{{ cliente.id }}</td>
                            <td>{{ cliente.cedula }}</td>
                            <td>{{ cliente.nombre }}</td>
                            <td>{{ cliente.email }}</td>
                            <td>{{ cliente.telefono }}</td>
                            <td>{{ cliente.direccion }}</td>
                            <td>{{ cliente.edad }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link
                                    :to="{
                                        name: 'editarCliente',
                                        params: { id: cliente.id },
                                    }"
                                    class="btn btn-info"
                                    ><i class="fas fa-edit"></i
                                ></router-link>
                                <a
                                    type="button"
                                    @click="eliminarCliente(cliente.id)"
                                    class="btn btn-danger"
                                    ><i class="fas fa-trash"></i
                                ></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "clientes",
    data() {
        return {
            clientes: [],
        };
    },
    mounted() {
        this.mostrarclientes();
    },
    methods: {
        async mostrarclientes() {
            await this.axios
                .get("/api/cliente")
                .then((response) => {
                    this.clientes = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.clientes = [];
                });
        },
        eliminarCliente(id) {
            if (confirm("¿Confirma eliminar el registro?")) {
                this.axios
                    .delete(`/api/cliente/${id}`)
                    .then((response) => {
                        this.mostrarclientes();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
