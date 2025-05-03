<script setup>
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import SvgIcon from '../SvgIcon.vue';
const showDropdownDesignDetails = ref(false);
const showDropdownFrontNeckDesign = ref(true);
const showDropdownBackNeckDesign = ref(false);
const showDropdownSleeveType = ref(false);
function toggleDropdownDesignDetails() {
    showDropdownDesignDetails.value = !showDropdownDesignDetails.value;
}
function toggleDropdownFrontNeckDesign() {
    showDropdownFrontNeckDesign.value = !showDropdownFrontNeckDesign.value;
}
function toggleDropdownBackNeckDesign() {
    showDropdownBackNeckDesign.value = !showDropdownBackNeckDesign.value;
}
function toggleDropdownSleeveType() {
    showDropdownSleeveType.value = !showDropdownSleeveType.value;
}
</script>
<template>
    <div class="mt-5">
        <div @click="toggleDropdownDesignDetails()" class="flex">
            <h1 class="font-normal text-md leading-4 tracking-normal font-lato"> Design Details
            </h1>
            <Icon v-if="showDropdownDesignDetails == false" icon="icon-park-outline:down" width="20" height="20"
                class="text-black ml-2" />
            <Icon v-if="showDropdownDesignDetails == true" icon="icon-park-outline:up" width="20" height="20"
                class="text-black ml-2" />
        </div>
        <!-- Dropdown -->
        <div v-show="showDropdownDesignDetails" class="z-10">
            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                <li>
                    <!--  Front Neck Design -->
                    <div>
                        <div @click="toggleDropdownFrontNeckDesign()" class="flex">
                            <h1 class="font-normal ml-3 mt-4 text-[16px] leading-4 tracking-normal font-lato">
                                Front Neck Design
                            </h1>
                            <Icon v-if="showDropdownFrontNeckDesign == false" icon="icon-park-outline:down" width="20"
                                height="20" class="text-black ml-2 mt-3" />
                            <Icon v-if="showDropdownFrontNeckDesign == true" icon="icon-park-outline:up" width="20"
                                height="20" class="text-black ml-2 mt-3" />
                        </div>
                        <!-- Dropdown -->
                        <div v-show="showDropdownFrontNeckDesign" class="z-10">
                            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                                <li>
                                    <div class="flex flex-row gap-5 lg:ml-10 ml-5 py-5 text-black font-lato text-sm">
                                        <div>
                                            <!-- <img src="/images/V Neck.png" alt="V Neck"> -->
                                            <SvgIcon :name="'v-neck'" />
                                            <h1
                                                class="font-medium mt-3 text-[12px] leading-[8px] tracking-normal text-center font-lato">
                                                V Neck</h1>

                                        </div>
                                        <div>
                                            <SvgIcon :name="'square-neck'" />
                                            <h1
                                                class="font-medium mt-3 text-[12px] leading-[8px] tracking-normal text-center font-lato">
                                                Square Neck</h1>
                                        </div>
                                        <div>
                                            <SvgIcon :name="'halter-neck'" />
                                            <h1
                                                class="font-medium mt-3 text-[12px] leading-[8px] tracking-normal text-center font-lato">
                                                Halter Neck</h1>
                                        </div>
                                        <div>
                                            <SvgIcon :name="'round-neck'" />
                                            <h1
                                                class="font-medium mt-3 text-[12px] leading-[8px] tracking-normal text-center font-lato">
                                                Round Neck</h1>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--  Back Neck Design -->
                    <div>
                        <div @click="toggleDropdownBackNeckDesign()" class="flex">
                            <h1 class="font-normal ml-3 mt-4 text-[16px] leading-4 tracking-normal font-lato">
                                Back Neck Design
                            </h1>
                            <Icon v-if="showDropdownBackNeckDesign == false" icon="icon-park-outline:down" width="20"
                                height="20" class="text-black ml-2 mt-3" />
                            <Icon v-if="showDropdownBackNeckDesign == true" icon="icon-park-outline:up" width="20"
                                height="20" class="text-black ml-2 mt-3" />
                        </div>
                        <!-- Dropdown -->
                        <div v-show="showDropdownBackNeckDesign" class="z-10">
                            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                                <li>
                                    <div class="flex flex-row gap-5 lg:ml-10 ml-5 py-5 text-black font-lato text-sm">
                                        <div>
                                            <!-- <img src="/images/V Neck.png" alt="V Neck"> -->
                                            <SvgIcon :name="'u-neck'" />
                                            <h1
                                                class="font-medium mt-3 text-[12px] leading-[8px] tracking-normal text-center font-lato">
                                                U Neck</h1>

                                        </div>
                                        <div>
                                            <SvgIcon :name="'v-neck-back'" />
                                            <h1
                                                class="font-medium mt-3 text-[12px] leading-[8px] tracking-normal text-center font-lato">
                                                V Neck</h1>
                                        </div>
                                        <div>
                                            <SvgIcon :name="'cross-neck'" />
                                            <h1
                                                class="font-medium mt-3 text-[12px] leading-[8px] tracking-normal text-center font-lato">
                                                Cross Neck</h1>
                                        </div>
                                        <div>
                                            <SvgIcon :name="'close-neck'" />
                                            <h1
                                                class="font-medium mt-3 text-[12px] leading-[8px] tracking-normal text-center font-lato">
                                                Close Neck</h1>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--  Sleeve Type -->
                    <div>
                        <div @click="toggleDropdownSleeveType()" class="flex">
                            <h1 class="font-normal ml-3 mt-4 text-[16px] leading-4 tracking-normal font-lato">
                                Sleeve Type
                            </h1>
                            <Icon v-if="showDropdownSleeveType == false" icon="icon-park-outline:down" width="20"
                                height="20" class="text-black ml-2 mt-3" />
                            <Icon v-if="showDropdownSleeveType == true" icon="icon-park-outline:up" width="20"
                                height="20" class="text-black ml-2 mt-3" />
                        </div>
                        <!-- Dropdown -->
                        <div v-show="showDropdownSleeveType" class="z-10">
                            <ul class="text-md text-black dark:text-black" aria-labelledby="dropdownTrigger">
                                <li>
                                    <div class="flex flex-row gap-3 lg:ml-10 ml-5 pt-4 text-black font-lato text-sm">
                                        <div class="text-center">
                                            <h1 class="text-[14px] tracking-normal font-lato">
                                                Full
                                            </h1>
                                        </div>
                                        <div>|</div>

                                        <div class="text-center">
                                            <h1 class="text-[14px] tracking-normal font-lato">
                                                Half
                                            </h1>
                                        </div>
                                        <div>|</div>

                                        <div class="text-center">
                                            <h1 class="text-[14px] tracking-normal font-lato">
                                                Cap</h1>
                                        </div>
                                        <div>|</div>

                                        <div class="text-center">
                                            <h1 class="text-[14px] tracking-normal font-lato">
                                                No</h1>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</template>