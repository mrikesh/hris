<template>
<div class="filter-container" ref="dropdown">
    <div class="filter-input" v-on:click="showDropdown">
        <input type="text" :placeholder="placeholder" v-model="searchQuery" @input="filterOptions">
    </div>
    <div class="dropdownbtn" v-on:click="showDropdown">
        <span class="material-icons custom-icon">{{dropdownVisible ? 'arrow_drop_up' : 'arrow_drop_down'}}</span>
    </div>
    <div class="dropdown-items" v-if="dropdownVisible">
        <ul>
            <li v-for="(item, index) in filteredItems" :key="index" @mousedown.prevent="selectOption(item)">
                {{ item }}
            </li>
        </ul>
    </div>
</div>
</template>

<script>
export default {
    name: "FilterTab",
    data() {
        return {
            dropdownVisible: false,
            searchQuery: "",
            filteredItems: this.filterItems
        };
    },
    props: {
        placeholder: {
            type: String,
        },
        filterItems: {
            type: Array,
            default: () => []
        }
    },
    methods: {
        showDropdown() {
            this.dropdownVisible = !this.dropdownVisible;
        },
        filterOptions() {
            const query = this.searchQuery.toLowerCase();
            this.filteredItems = this.filterItems.filter(item =>
                item.toLowerCase().includes(query)
            );
        },
        selectOption(item) {
            this.searchQuery = item;
            this.dropdownVisible = false;
        },
        handleBlur() {
            setTimeout(() => {
                this.dropdownVisible = false;
            }, 200);
        },
        handleClickOutside(event) {
            if (!this.$refs.dropdown.contains(event.target)) {
                this.dropdownVisible = false;
            }
        }
    },
    watch: {
        searchQuery() {
            if (this.searchQuery === "") {
                this.filteredItems = this.filterItems;
            }
        }
    },
    mounted() {
        this.filteredItems = this.filterItems;
        document.addEventListener('click', this.handleClickOutside);
    },
    beforeDestroy() {
        document.removeEventListener('click', this.handleClickOutside);
    }
};
</script>

<style scoped>
.filter-container {
    margin: 0 8px 0 0;
    padding: 0 8px;
    display: flex;
    align-items: center;
    border: .25px solid #c7c1c180;
    border-radius: 4px;
    position: relative;
    /* Add relative positioning */
}

.filter-input input {
    width: 200px;
    min-height: 40px;
    border: none;
    font-size: 14px;
}

.filter-input input:focus {
    outline: none;
    box-shadow: none;
}

.dropdownbtn {
    display: flex;
    align-items: center;
}

.custom-icon {
    cursor: pointer;
}

.dropdown-items {
    background-color: #ffffff;
    border: 1px solid black;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    z-index: 1000;
    border: .25px solid #c7c1c180;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.dropdown-items ul {
    padding: 0;
    margin: 0;
    list-style: none;
}

.dropdown-items li {
    padding: 10px 16px;
    color: #343434;
    font-size: 14px;
}

.dropdown-items li:hover {
    cursor: pointer;
    background-color: #dddddd;
}
</style>
