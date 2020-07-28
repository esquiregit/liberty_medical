import React from 'react';
import Button from '@material-ui/core/Button';

const ChemistryTab = ({ history }) => {
    return (
        <table>
            <tbody>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/bue-creatinine/')}
                            variant="outlined">
                            BUE + creatinine
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/bue-creatinine-egfr/')}
                            variant="outlined">
                            BUE + creatinine + eGFR
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/bue-lft/')}
                            variant="outlined">
                            BUE + LFT
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/bue-lipids/')}
                            variant="outlined">
                            BUE + lipids
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/blood-sugar/')}
                            variant="outlined">
                            blood sugar
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/c-reactive-protein/')}
                            variant="outlined">
                            c reactive protein
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/csf-biochem/')}
                            variant="outlined">
                            CSF biochem
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/calcium-profile/')}
                            variant="outlined">
                            calcium profile
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/cardiac-enzyme/')}
                            variant="outlined">
                            cardiac enzyme
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/compact-chemistry/')}
                            variant="outlined">
                            compact chemistry
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/folate-b12/')}
                            variant="outlined">
                            folate b12
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/general-chemistry/')}
                            variant="outlined">
                            general chemistry
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/hba1c/')}
                            variant="outlined">
                            HBA1C
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/hypersensitive-cpr/')}
                            variant="outlined">
                            hypersensitive CPR
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/ise/')}
                            variant="outlined">
                            ISE
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/iron-study/')}
                            variant="outlined">
                            iron study
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/lft/')}
                            variant="outlined">
                            LFT
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/lipid-profile/')}
                            variant="outlined">
                            lipid profile
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/protein-electrophoresis/')}
                            variant="outlined">
                            protein electrophoresis
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/sc3-sc4/')}
                            variant="outlined">
                            SC3 SC4
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/serum-lipase/')}
                            variant="outlined">
                            serum lipase
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/urine/')}
                            variant="outlined">
                            urine
                        </Button>
                    </td>
                    <td colSpan="2">
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/urine-acr/')}
                            variant="outlined">
                            urine ACR
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>
    )
}

export default ChemistryTab;
