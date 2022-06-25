<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Categoria</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre" class="form-label"
                                    >Nombre</label
                                >
                                <input
                                    type="text"
                                    name="nombre_categoria"
                                    class="form-control"
                                    v-model="categoriaProducto.nombre_categoria"
                                />
                            </div>
                            <div class="col-md-8">
                                <label for="descripcion" class="form-label"
                                    >Descripcion</label
                                >
                                <input
                                    type="text"
                                    name="descripcion_categoria"
                                    class="form-control"
                                    v-model="
                                        categoriaProducto.descripcion_categoria
                                    "
                                />
                            </div>
                        </div>
                        <br />
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "editar-categoria",
    data() {
        return {
            categoriaProducto: {
                nombre_categoria: "",
                descripcion_categoria: "",
            },
        };
    },
    mounted() {
        this.mostrarcategoria();
    },
    methods: {
        async mostrarcategoria() {
            await this.axios
                .get(`/api/categoria/${this.$route.params.id}`)
                .then((response) => {
                    const { nombre_categoria, descripcion_categoria } =
                        response.data;
                    this.categoriaProducto.nombre_categoria = nombre_categoria;
                    this.categoriaProducto.descripcion_categoria =
                        descripcion_categoria;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async actualizar() {
            await this.axios
                .put(
                    `/api/categoria/${this.$route.params.id}`,
                    this.categoriaProducto
                )
                .then((response) => {
                    this.$router.push({ name: "mostrarCategorias" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
