<template>
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
        :class="claseEstadoVacante()"
        @click="cambiarEstado()"
        :key="estadoVacanteData"
    >
        {{ estadoVacante }}
    </span>
</template>

<script>
export default {
    props: ['estado', 'vacanteId'],
    mounted() {
        this.estadoVacanteData = Number(this.estado);
    },
    data() {
        return {
            estadoVacanteData: null
        }
    },
    methods: {
        claseEstadoVacante() {
            return this.estadoVacanteData
                ? "bg-green-100 text-green-800"
                : "bg-red-100 text-red-800";
        },
        cambiarEstado() {
            this.estadoVacanteData = (this.estadoVacanteData) ? 0 : 1;

            const params = {
                estado: this.estadoVacanteData
            };

            axios
                .post(`/vacantes/${this.vacanteId}`, params)
                .then(respuesta => console.log(respuesta))
                .catch(error => console.log(error));
        }
    },
    computed: {
        estadoVacante() {
            return this.estadoVacanteData ? 'Activa' : 'Invactiva';
        }
    }
}
</script>
