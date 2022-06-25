<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link
                :to="{ name: 'crearCategoria' }"
                class="btn btn-success"
                ><i class="fas fa-plus-circle"></i
            ></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="categoriaProducto in categoriaProductos"
                            :key="categoriaProducto.id"
                        >
                            <td>{{ categoriaProducto.id }}</td>
                            <td>
                                {{ categoriaProducto.nombre_categoria }}
                            </td>
                            <td>
                                {{ categoriaProducto.descripcion_categoria }}
                            </td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link
                                    :to="{
                                        name: 'editarCategoria',
                                        params: { id: categoriaProducto.id },
                                    }"
                                    class="btn btn-info"
                                    ><i class="fas fa-edit"></i
                                ></router-link>
                                <a
                                    type="button"
                                    @click="
                                        eliminarCategoria(categoriaProducto.id)
                                    "
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
    name: "categorias",
    data() {
        return {
            categoriaProductos: [],
        };
    },
    mounted() {
        this.mostrarCategorias();
    },
    methods: {
        async mostrarCategorias() {
            await this.axios
                .get("/api/cat")
                .then((response) => {
                    this.categoriaProductos = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.categoriaProductos = [];
                });
        },
        eliminarCategoria(id) {
            if (confirm("¿Confirma eliminar Categoria?")) {
                this.axios
                    .delete(`/api/cat/${id}`)
                    .then((response) => {
                        this.mostrarCategorias();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
