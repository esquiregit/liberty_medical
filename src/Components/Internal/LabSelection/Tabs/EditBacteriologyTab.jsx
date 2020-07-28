import React from 'react';
import Button from '@material-ui/core/Button';

const BacteriologyTab = ({ history }) => {
    return (
        <table>
            <tbody>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/ascitic-fluid/')}
                            variant="outlined">
                            ascitic Fluid CS
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/aspirate-cs/')}
                            variant="outlined">
                            aspirate CS
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/blood-cs/')}
                            variant="outlined">
                            blood CS
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/ear-swab-cs/')}
                            variant="outlined">
                            ear swab CS
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/endocervical-swab/')}
                            variant="outlined">
                            endocervical swab
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/eye-swab-cs/')}
                            variant="outlined">
                            eye swab CS
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/hvs-cs/')}
                            variant="outlined">
                            HVS CS
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/hvs-re/')}
                            variant="outlined">
                            HVS RE
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/pleural-fluid/')}
                            variant="outlined">
                            pleural fluid
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/pus-fluid/')}
                            variant="outlined">
                            pus fluid
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/semen-cs/')}
                            variant="outlined">
                            semen CS
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/skin-snip/')}
                            variant="outlined">
                            skin snip
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/sputum-cs/')}
                            variant="outlined">
                            sputum CS
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/sputum-afb/')}
                            variant="outlined">
                            sputum AFB
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/stool-cs/')}
                            variant="outlined">
                            stool CS
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/stool-re/')}
                            variant="outlined">
                            stool RE
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/throat-swab/')}
                            variant="outlined">
                            throat swab CS
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/urethral-cs/')}
                            variant="outlined">
                            urethral CS
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/urine-cs/')}
                            variant="outlined">
                            urine CS
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/urine-re/')}
                            variant="outlined">
                            urine RE
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/wound-cs/')}
                            variant="outlined">
                            wound CS
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>
    )
}

export default BacteriologyTab;
