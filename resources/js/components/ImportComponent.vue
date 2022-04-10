<template>
    <div>
        <h1>
            Import page
            <input class="btn btn-primary float-right" id="importWorkFile" type="file" @change="importWorks" accept=".xlsm, .xlsx, .csv,text/csv, application/excel, application/vnd.ms-excel, application/vnd.msexce">
        </h1>
    </div>
</template>
<script>
export default {
    name: "ImportComponent",
    data() {
        return {
        };
    },
    mounted() {
    },
    methods: {
        async importWorks(e) {
            if (await this.checkFileTypeExcel() == false) {
                document.getElementById("importWorkFile").value = null;
                return
            }

            let formData = new FormData()

            formData.append('file', e.target.files[0]);

            axios.post('/works/import', formData)
                .then(() => {
                    alert("Imported Successfully!");
                })
                .catch(() => {
                    alert("Spmething went wrong!");
                })

            document.getElementById("importWorkFile").value = null;
            return
        },
        checkFileTypeExcel() {
            let validExts = new Array(".xlsx", ".xls", ".csv")
            let fileExt = document.getElementById("importWorkFile").value

            fileExt = fileExt.substring(fileExt.lastIndexOf('.'))
            if (validExts.indexOf(fileExt) < 0) {
                alert("Invalid file selected, valid files are of " + validExts.toString() + " types.")
                return false;
            }
            else return true;
        },
    }
}
</script>
