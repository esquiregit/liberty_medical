import React from 'react';
import moment from "moment";
import { Page, Text, View, Document, StyleSheet } from "@react-pdf/renderer";

const styles = StyleSheet.create({
    page: {
        backgroundColor: "#ffffff"
    },
    container: {
        display: "flex",
        flexDirection: "row",
        padding: 15
    },
    image_div: {
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
    },
    image: {
        width: 200,
        height: 270,
        borderRadius: 120,
        border: '20px solid #aaa',
        marginBottom: 10,
    },
    two_column: {
        display: 'flex',
        flexDirection: 'row',
        marginTop: 10,
        marginBottom: 20,
        borderTop: '1px solid #666',
        borderBottom: '1px solid #666',
        paddingTop: '5px',
        paddingBottom: '6px',
    },
    two_column_left: {
        textAlign: 'left',
        fontSize: 11,
    },
    two_column_right: {
        textAlign: 'right',
        fontSize: 11,
        marginRight: 65,
    },
    info_two_column: {
        display: 'flex',
        flexDirection: 'row',
        border: '1px solid #333',
        paddingBottom: 0,
        borderBottom: 'transparent',
    },
    info_two_column_last: {
        display: 'flex',
        flexDirection: 'row',
        paddingBottom: 0,
        border: '1px solid #333',
    },
    info_two_column_left: {
        textAlign: 'right',
        fontSize: 11,
        padding: 10,
        flex: '1 1 25%',
        marginRight: 30,
        color: '#555',
    },
    info_two_column_right: {
        textAlign: 'left',
        fontSize: 11,
        marginRight: 95,
        padding: 10,
        flex: '1 2 25%',
    },
    info_two_column_right_wide: {
        textAlign: 'left',
        fontSize: 11,
        marginLeft: -20,
        marginRight: 95,
        padding: 10,
        flex: '1 2 80%',
    },
    addressHeader: {
        textAlign: 'center',
        fontSize: 20,
        fontWeight: 'extrabold',
        paddingBottom: 6,
        marginTop: 50,
    },
    addressSubHeader: {
        textAlign: 'center',
        fontSize: 14,
        fontWeight: 'semibold',
        paddingBottom: 6,
    },
    addressParagraph: {
        textAlign: 'center',
        fontSize: 12,
        paddingBottom: 6,
    },
    addressParagraphLast: {
        textAlign: 'center',
        fontSize: 12,
        paddingBottom: 6,
        marginBottom: 15,
    }
});

function PatientPDF({ patient }) {
    return (
        <Document>
            <Page style={styles.page} size="A4" wrap>
                <View style={styles.container}>
                    <View>
                        <View>
                            <Text style={styles.addressHeader}>LIBERTY MEDICAL LABORATORY SERVICES</Text>
                            <Text style={styles.addressSubHeader}>RELIABLE LAB SERVICE AT YOUR CONVEVIENCE</Text>
                            <Text style={styles.addressParagraph}>P.O Box A.N 12143 Accra North, Ghana</Text>
                            <Text style={styles.addressParagraph}>Tel.: 050 012 5098 / 054 012 5099 / 055 663 3514 / 024 345 0808</Text>
                            <Text style={styles.addressParagraph}>Email: libertymedicallab@gmail.com / amoatengkweku@gmail.com</Text>
                            <Text style={styles.addressParagraph}>Loc:Opp. Korle Bu Admin Block, Opp. Korle Bu Police Station</Text>
                            <Text style={styles.addressParagraph}>Opp. Amasaman Hospital near World Vision Int'l Off Methodist Church</Text>
                            <Text style={styles.addressParagraphLast}>Agyirigano Health Link Clinic, East Legon</Text>
                        </View>
                        <View style={styles.two_column}>
                            <Text style={styles.two_column_left}>Patient Info</Text>
                            <Text style={styles.two_column_right}>{moment().format('dddd Do MMMM YYYY [at] HH:mm:ss')}</Text>
                        </View>
                        <View style={[styles.info_two_column, { backgroundColor: '#eee'}]}>
                            <Text style={styles.info_two_column_left}>Patient ID:</Text>
                            <Text style={styles.info_two_column_right}>{patient.patient_id}</Text>
                            <Text style={styles.info_two_column_left}>Patient:</Text>
                            <Text style={styles.info_two_column_right}>{patient.title} {patient.name}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.info_two_column_left}>Date Of Birth:</Text>
                            <Text style={styles.info_two_column_right}>{patient.date_of_birth}</Text>
                            <Text style={styles.info_two_column_left}>Gender:</Text>
                            <Text style={styles.info_two_column_right}>{patient.gender}</Text>
                        </View>
                        <View style={[styles.info_two_column, { backgroundColor: '#eee'}]}>
                            <Text style={styles.info_two_column_left}>Email Address:</Text>
                            <Text style={styles.info_two_column_right}>{patient.email_address}</Text>
                            <Text style={styles.info_two_column_left}>Mobile Phone:</Text>
                            <Text style={styles.info_two_column_right}>{patient.mobile_phone}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.info_two_column_left}>Home Phone:</Text>
                            <Text style={styles.info_two_column_right}>{patient.home_phone} {!patient.home_phone && "No Home Phone"}</Text>
                            <Text style={styles.info_two_column_left}>Work Phone:</Text>
                            <Text style={styles.info_two_column_right}>{patient.work_phone} {!patient.work_phone && "No Work Phone"}</Text>
                        </View>
                        <View style={[styles.info_two_column, { backgroundColor: '#eee'}]}>
                            <Text style={styles.info_two_column_left}>Next Of Kin:</Text>
                            <Text style={styles.info_two_column_right}>{patient.next_of_kin_name}</Text>
                            <Text style={styles.info_two_column_left}>Next Of Kin Number:</Text>
                            <Text style={styles.info_two_column_right}>{patient.next_of_kin_number}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.info_two_column_left}>Branch:</Text>
                            <Text style={styles.info_two_column_right}>{patient.branch}</Text>
                            <Text style={styles.info_two_column_left}>Added By:</Text>
                            <Text style={styles.info_two_column_right}>{patient.staff}</Text>
                        </View>
                        <View style={[styles.info_two_column_last, { backgroundColor: '#eee'}]}>
                            <Text style={styles.info_two_column_left}>Date Added:</Text>
                            <Text style={styles.info_two_column_right_wide}>{patient.date_added}</Text>
                        </View>
                    </View>
                </View>
            </Page>
        </Document>
    )
}

export default PatientPDF;
