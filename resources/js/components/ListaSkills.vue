<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4 cursor-pointer"
                :class="verificarClaseActiva(skill)"
                v-for="( skill, i ) in this.skills"
                :key="i"
                @click="activar($event)"
            >
                {{ skill }}
            </li>
        </ul>

        <input type="hidden" name="skills" id="skills" >
    </div>
</template>

<script>
export default {
    props: ['skills', 'oldskills'],
    data() {
        return {
            habilidades: new Set()
        }
    },
    created() {
        if (this.oldskills) {
            const skillsArray = this.oldskills.split(',');
            skillsArray.forEach(skill => this.habilidades.add(skill))
        }
    },
    mounted() {
        document.querySelector('#skills').value = this.oldskills;
    },
    methods: {
        activar(e) {
            const habilidad = e.target.textContent.trim();

            (e.target.classList.contains('bg-green-400'))
                ? this.habilidades.delete(habilidad)
                : this.habilidades.add(habilidad)

            e.target.classList.toggle('bg-green-400')

            const stringHabilidades = [...this.habilidades];
            document.querySelector('#skills').value = stringHabilidades;
        },
        verificarClaseActiva(skill) {
            return this.habilidades.has(skill) ? 'bg-green-400' : '';
        }
    }
}
</script>
