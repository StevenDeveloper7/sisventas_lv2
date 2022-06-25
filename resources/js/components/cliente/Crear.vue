<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Cliente</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="cedula" class="form-label"
                                    >Cedula</label
                                >
                                <input
                                    type="number"
                                    name="cedula"
                                    class="form-control"
                                    v-model="cliente.cedula"
                                />
                            </div>
                            <div class="col-md-4">
                                <label for="nombre" class="form-label"
                                    >Nombre</label
                                >
                                <input
                                    type="text"
                                    name="nombre"
                                    class="form-control"
                                    v-model="cliente.nombre"
                                />
                            </div>
                            <div class="col-md-5">
                                <label for="email" class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    v-model="cliente.email"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="telefono" class="form-label"
                                    >Telefono</label
                                >
                                <input
                                    type="number"
                                    name="telefono"
                                    class="form-control"
                                    v-model="cliente.telefono"
                                />
                            </div>
                            <div class="col-md-6">
                                <label for="direccion" class="form-label"
                                    >Direccion</label
                                >
                                <input
                                    type="text"
                                    name="direccion"
                                    class="form-control"
                                    v-model="cliente.direccion"
                                />
                            </div>
                            <div class="col-md-2">
                                <label for="edad" class="form-label"
                                    >Edad</label
                                >
                                <input
                                    type="number"
                                    name="edad"
                                    class="form-control"
                                    v-model="cliente.edad"
                                />
                            </div>
                        </div>
                        <br />
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                Guardar
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
    name: "crear-cliente",
    data() {
        return {
            cliente: {
                cedula: "",
                nombre: "",
                email: "",
                telefono: "",
                direccion: "",
                edad: "",
            },
        };
    },
    methods: {
        async crear() {
            await this.axios
                .post("/api/cliente", this.cliente)
                .then((response) => {
                    this.$router.push({ name: "mostrarClientes" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
