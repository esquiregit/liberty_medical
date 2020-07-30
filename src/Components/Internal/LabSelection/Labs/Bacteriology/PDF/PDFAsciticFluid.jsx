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
        paddingLeft: 5,
        paddingRight: 2
    },
    two_column: {
        display: 'flex',
        flexDirection: 'row',
        // marginTop: 10,
        marginRight: 20,
        // marginBottom: 25,
        marginLeft: 10,
        borderTop: '1px solid #666',
        borderBottom: '1px solid #666',
        paddingTop: '10px',
        paddingBottom: '11px',
    },
    two_column_left: {
        textAlign: 'left',
        fontSize: 12,
        width: '50%'
    },
    two_column_right: {
        textAlign: 'right',
        fontSize: 12,
        width: '50%'
    },
    two_column_one: {
        textAlign: 'right',
        fontSize: 12,
        width: '50%',
        marginRight: 8,
        color: '#555'
    },
    two_column_two: {
        textAlign: 'left',
        fontSize: 12,
        width: '50%',
        marginLeft: 8,
    },
    info_column: {
        display: 'flex',
        flexDirection: 'row',
        border: '1px solid #333',
        paddingBottom: 0,
        borderBottom: 'transparent',
    },
    info_two_column: {
        display: 'flex',
        flexDirection: 'row',
        paddingBottom: 0,
    },
    info_two_column_left: {
        textAlign: 'right',
        fontSize: 12,
        padding: 5,
        flex: '1 1 20%',
        color: '#555',
    },
    info_two_column_right: {
        textAlign: 'left',
        fontSize: 12,
        padding: 5,
        flex: '1 2 30%',
    },
    info_three_column: {
        display: 'flex',
        flexDirection: 'row',
        paddingBottom: 0,
    },
    info_three_column_left: {
        textAlign: 'right',
        fontSize: 12,
        padding: 5,
        flex: '1 1 13%',
        color: '#555',
    },
    info_three_column_right: {
        textAlign: 'left',
        fontSize: 12,
        padding: 5,
        flex: '1 2 20%',
    },
    row: {
        width: '100%'
    },
    row_left: {
        fontSize: 12,
        color: '#555',
        width: '20%',
        textAlign: 'right',
        padding: 5,
    },
    row_right: {
        fontSize: 12,
        width: '80%',
        textAlign: 'left',
        padding: 5,
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
    },
    table_column: {
        display: 'flex',
        flexDirection: 'row',
        paddingTop: 8,
        paddingBottom: 8,
        marginLeft: 30,
        marginRight: 30,
    },
    table_column_one: {
        fontSize: 12,
        flex: '1 1 35%',
        color: '#333',
    },
    table_column_two: {
        fontSize: 12,
        flex: '1 1 35%',
        color: '#012',
    },
    table_column_three: {
        fontSize: 12,
        flex: '1 1 30%',
        color: '#012',
    },
    table_column_wide: {
        fontSize: 12,
        flex: '1 1 62%',
        color: '#012',
    },
    table_column_six: {
        fontSize: 12,
        flex: '1 1 16.67%',
        color: '#333',
    },
    table_column_six_wide: {
        fontSize: 12,
        flex: '1 1 83.33%',
        color: '#333',
        textAlign: 'left',
    },
});

function PDFLab({ lab }) {
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
                            <Text style={styles.two_column_left}>Ascitic Fluid CS</Text>
                            <Text style={styles.two_column_right}>{moment().format('dddd Do MMMM YYYY [at] HH:mm:ss')}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.info_two_column_left}>Invoice:</Text>
                            <Text style={styles.info_two_column_right}>{lab.invoice_id}</Text>
                            <Text style={styles.info_two_column_left}>Patient ID:</Text>
                            <Text style={styles.info_two_column_right}>{lab.patient_id}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.info_two_column_left}>Patient:</Text>
                            <Text style={styles.info_two_column_right}>{lab.name}</Text>
                            <Text style={styles.info_two_column_left}>Gender:</Text>
                            <Text style={styles.info_two_column_right}>{lab.gender}</Text>
                        </View>
                        <View style={styles.info_two_column}>
                            <Text style={styles.row_left}>Date Of Birth:</Text>
                            <Text style={styles.row_right}>{lab.date_of_birth}</Text>
                        </View>
                        <View style={[styles.info_two_column, {marginBottom: 30}]}>
                            <Text style={styles.info_two_column_left}>Added By:</Text>
                            <Text style={styles.info_two_column_right}>{lab.staff}</Text>
                            <Text style={styles.info_two_column_left}>Date Added:</Text>
                            <Text style={styles.info_two_column_right}>{lab.date_added}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee',borderTop: '1px solid #333'}]}>
                            <Text style={styles.two_column_one}>Gram Stain</Text>
                            <Text style={styles.two_column_two}>{lab.gram_stain}</Text>
                        </View>
                        <View style={styles.table_column}>
                            <Text style={styles.two_column_one}>Z-N Stain</Text>
                            <Text style={styles.two_column_two}>{lab.zn_stain}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee'}]}>
                            <Text style={styles.two_column_one}>Fungal Element</Text>
                            <Text style={styles.two_column_two}>{lab.zn_stain}</Text>
                        </View>
                        <View style={styles.table_column}>
                            <Text style={styles.two_column_one}>Culture</Text>
                            <Text style={styles.two_column_two}>{lab.culture}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee'}]}>
                            <Text style={styles.table_column_six}>Bacteria</Text>
                            <Text style={[styles.table_column_six, {textAlign: 'left'}]}>{lab.bacteria_one}</Text>
                            <Text style={styles.table_column_six}>Antibiotics</Text>
                            <Text style={styles.table_column_six}>Sensitivity</Text>
                            <Text style={styles.table_column_six}>Antibiotics</Text>
                            <Text style={styles.table_column_six}>Sensitivity</Text>
                        </View>
                        <View style={styles.table_column}>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_one}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_one}</Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_two}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_two}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee'}]}>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_three}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_three}</Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_four}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_four}</Text>
                        </View>
                        <View style={styles.table_column}>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_five}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_five}</Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_six}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_six}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee'}]}>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_seven}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_seven}</Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_eight}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_eight}</Text>
                        </View>
                        <View style={styles.table_column}>
                            <Text style={styles.table_column_six}>Bacteria</Text>
                            <Text style={[styles.table_column_six, {textAlign: 'left'}]}>{lab.bacteria_two}</Text>
                            <Text style={styles.table_column_six}>Antibiotics</Text>
                            <Text style={styles.table_column_six}>Sensitivity</Text>
                            <Text style={styles.table_column_six}>Antibiotics</Text>
                            <Text style={styles.table_column_six}>Sensitivity</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee'}]}>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_nine}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_nine}</Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_ten}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_ten}</Text>
                        </View>
                        <View style={styles.table_column}>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_eleven}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_eleven}</Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_twelve}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_twelve}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee'}]}>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_thirteen}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_thirteen}</Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_fourteen}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_fourteen}</Text>
                        </View>
                        <View style={styles.table_column}>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}></Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_fifteen}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_fifteen}</Text>
                            <Text style={styles.table_column_six}>{lab.antibiotics_sixteen}</Text>
                            <Text style={styles.table_column_six}>{lab.sensitivity_sixteen}</Text>
                        </View>
                        <View style={[styles.table_column, {backgroundColor: '#eee'}]}>
                            <Text style={styles.table_column_six}>Comments</Text>
                            <Text style={styles.table_column_six_wide}>{lab.comments}</Text>
                        </View>
                    </View>
                </View>
            </Page>
        </Document>
    )
}

export default PDFLab;
