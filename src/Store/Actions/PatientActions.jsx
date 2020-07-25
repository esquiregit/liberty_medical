export const storePatient = patient => {
    return {
        type    : 'STORE_PATIENT',
        patient : patient,
    };
}
